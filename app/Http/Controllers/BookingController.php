<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Alatukur;
use App\Models\Katalog;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create()
    {
        $katalogData = [];
    
        Katalog::chunk(10, function ($katalogChunk) use (&$katalogData) {
            foreach ($katalogChunk as $item) {
                // Process each $item here or build your data array
                // For example, you can add each item to the $katalogData array
                $katalogData[] = [
                    'namaalat' => $item->namaalat,
                    'itemid' => $item->item_id,
                    'merk' => $item->merk,
                    'type' => $item->type,
                ];
            }
        });
        return view('/booking-order/bookingorder', [
            'katalog' => json_encode($katalogData)
    ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'perusahaan' => 'required|string',
            'hp' => 'required|string',
            'keterangan' => 'nullable'
        ]);

         // Mendapatkan tahun saat ini
        $currentYear = Carbon::now()->format('y');

        // Menghitung nomor urut berdasarkan pesanan terakhir
        // if ($request->lab == "AJKT"){
        //     $lastOrder = Booking::latest()->first();
        //     $lastOrderNumber = $lastOrder ? intval(substr($lastOrder->nomorbooking, -2)) : 0;
        //     $newOrderNumber = $lastOrderNumber + 1;
        //     // $lokasilab = $request->lab;

        //     // Membentuk nomor order dengan format "BO-CAL-YY-No. Urut"
        //     $nomorOrder = 'BO-AJKT-' . $currentYear . '-' . str_pad($newOrderNumber, 2, '0', STR_PAD_LEFT);
        // }elseif ($request->lab == "AMDN"){
        //     $lastOrder = Booking::latest()->first();
        //     $lastOrderNumber = $lastOrder ? intval(substr($lastOrder->nomorbooking, -2)) : 0;
        //     $newOrderNumber = $lastOrderNumber + 1;
        //     // $lokasilab = $request->lab;

        //     // Membentuk nomor order dengan format "BO-CAL-YY-No. Urut"
        //     $nomorOrder = 'BO-AMDN-' . $currentYear . '-' . str_pad($newOrderNumber, 2, '0', STR_PAD_LEFT);
        // }

        if ($request->lab == "AJKT") {
            $lastJakartaOrder = Booking::where('nomorbooking', 'LIKE', 'BO-AJKT-%')
                ->latest()
                ->first();
                
            $lastOrderNumber = $lastJakartaOrder ? intval(substr($lastJakartaOrder->nomorbooking, -2)) : 0;
            $newOrderNumber = $lastOrderNumber + 1;
            
            $nomorOrder = 'BO-AJKT-' . date('y') . '-' . str_pad($newOrderNumber, 2, '0', STR_PAD_LEFT);
        
        } elseif ($request->lab == "AMDN") {
        
            $lastMedanOrder = Booking::where('nomorbooking', 'LIKE', 'BO-AMDN-%')
                ->latest()
                ->first();
        
            $lastOrderNumber = $lastMedanOrder ? intval(substr($lastMedanOrder->nomorbooking, -2)) : 0; 
            $newOrderNumber = $lastOrderNumber + 1;
        
            $nomorOrder = 'BO-AMDN-' . date('y') . '-' . str_pad($newOrderNumber, 2, '0', STR_PAD_LEFT);
        }
        

        $booking = Booking::create([
            'nomorbooking' => $nomorOrder,
            'perusahaan' => $request->perusahaan,
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'lab' => $request->lab,
            'keterangan' => $request->keterangan,
            'status' => 'Open',
            'layanan' => $request->layanan
        ]);

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'namaalat') === 0) {
                $toolCounter = substr($key, 8); // Mengambil nomor urutan dari nama input
                
                $request->validate([
                    'merk' => 'nullable',
                    'type' => 'nullable',
                    'serial' => 'nullable',
                    'itemid' => 'nullable',
                    'namasertifikat' => 'nullable',
                ]);

                // Mengakses nilai "merk" dan input lainnya yang sesuai
                $merkKey = "merk" . $toolCounter;
                $typeKey = "type" . $toolCounter;
                $serialKey = "serial" . $toolCounter;
                $itemidKey = "itemid" . $toolCounter;
                $namasertifikatKey = "namasertifikat" . $toolCounter;
                
                Alatukur::create([
                    'namaalat' => $value,
                    'merk' => $request->$merkKey,
                    'type' => $request->$typeKey,
                    'serial' => $request->$serialKey,
                    'item_id' => $request->$itemidKey,
                    'namasertifikat' => $request->$namasertifikatKey,
                    'booking_id' => $booking->id,
                ]);
            }
        }

        $namaPemesan = $request->nama;
        $namaperusahaan = $request->perusahaan;
        $lab = $request->lab;
        if ($lab == "AJKT"){
            $pesan = "Selamat Siang Min. 
Saya *$namaPemesan* dari perusahaan *$namaperusahaan* telah melakukan booking order *Lab Kalibrasi Jakarta* di website dengan No. Order *$nomorOrder* Mohon untuk segera diproses terima kasih 🙏. 

_Note:_
Tracking Order di:
https://telkomcalibration.com/check-order?_token=suEsH2vgp4DAR2gVSWxH7n4rMgJ8rUsw7tAYP1Nx&nomorbooking=$nomorOrder";
        return redirect("https://api.whatsapp.com/send/?phone=628116417025&text=" . urlencode($pesan));

        // return redirect('https://api.whatsapp.com/send/?phone=628116417025&text=Selamat Siang Min.%0ASaya+*$booking->nama*+dari+perusahaan+Yamaha+telah+melakukan+booking+order+di+website+dengan+No.+Order+*BO-KAL-23*+%0A%0AMohon+untuk+segera+diproses+terima+kasih+🙏.%0A%0A_Note:_%0ATracking+Order+di:%0Ahttps%3A%2F%2Ftelkomcalibration.com%2Fen%2Fcheck-order%3F_token%3DsuEsH2vgp4DAR2gVSWxH7n4rMgJ8rUsw7tAYP1Nx%26order_ccl%3Dwdwdwdw');
    }elseif ($lab == "AMDN") {
        $pesan = "Selamat Siang Min. 
Saya *$namaPemesan* dari perusahaan *$namaperusahaan* telah melakukan booking order *Lab Kalibrasi Medan* di website dengan No. Order *$nomorOrder* Mohon untuk segera diproses terima kasih 🙏. 

_Note:_
Tracking Order di:
https://telkomcalibration.com/check-order?_token=suEsH2vgp4DAR2gVSWxH7n4rMgJ8rUsw7tAYP1Nx&nomorbooking=$nomorOrder";
    return redirect("https://api.whatsapp.com/send/?phone=628116417025&text=" . urlencode($pesan));

    // return redirect('https://api.whatsapp.com/send/?phone=628116417025&text=Selamat Siang Min.%0ASaya+*$booking->nama*+dari+perusahaan+Yamaha+telah+melakukan+booking+order+di+website+dengan+No.+Order+*BO-KAL-23*+%0A%0AMohon+untuk+segera+diproses+terima+kasih+🙏.%0A%0A_Note:_%0ATracking+Order+di:%0Ahttps%3A%2F%2Ftelkomcalibration.com%2Fen%2Fcheck-order%3F_token%3DsuEsH2vgp4DAR2gVSWxH7n4rMgJ8rUsw7tAYP1Nx%26order_ccl%3Dwdwdwdw');
}
        } 
        

    public function monitoring(){
        $booking = Booking::orderBy('created_at','asc')->where('status','Open')->orWhere('status', 'SPH Dikirim')->get();
        $booking2 = Booking::orderBy('created_at','asc')->where('status','progres')->get();
        $booking3 = Booking::orderBy('created_at','asc')->where('status','close')->orWhere('status', 'cancel')->get();
        $alatukur = Alatukur::all();

        return view('/awanlab/monitoring-booking/index',compact('booking','booking2','booking3','alatukur'));
    }

    public function edit($id){
        $bookingupdate = Booking::find($id);
        return view('/awanlab/monitoring-booking/update', compact('bookingupdate'));
    }

    public function update(Request $request){
        $updatebooking = Booking::where('id', $request->id)->update([
            'perusahaan' => $request->perusahaan,
            'nama'  => $request->nama,
            'hp'    => $request->hp,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);
        session()->flash('success', 'Data berhasil diupdate.');
        return redirect('/monitoring-booking');
    }

    public function kup($id){
        $booking = Booking::find($id);
        return view('/awanlab/monitoring-booking/kup', compact('booking'));
    }
    public function pap($id){
        $booking = Booking::find($id);
        return view('/awanlab/monitoring-booking/pap', compact('booking'));
    }
    public function formba($id){
        $booking = Booking::find($id);
        return view('/awanlab/monitoring-booking/form-ba', compact('booking'));
    }
    public function ate04(Request $request,$id){
        $booking = Booking::find($id);
        $lab = $request->lab_kalibrasi;
        $alamat = $request->alamat;
        $telp = $request->telp;
        $nomor = $request->nomor;
        $tanggal = $request->tanggal;
        $ttd = $request->ttd;
        $nik = $request->nik;
        $ba = $request->ba;
        return view ('/awanlab/monitoring-booking/cetak-ba',compact('booking','lab','alamat','telp','nomor','tanggal','ttd','nik','ba'));
    }
}
