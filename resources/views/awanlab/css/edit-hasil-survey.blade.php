@extends('awanlab/css/master')
@section('judul_halaman', 'Edit Hasil Survey CSS')
@section('konten')
@php
    $validStatuses = ['Telkom', 'Non-Telkom'];
    $validTregs = ['TREG 1', 'TREG 2', 'TREG 3', 'TREG 4', 'TREG 5', 'TREG 6', 'TREG 7'];
    $statusNeedsSelection = !in_array($survey->status, $validStatuses);
    $tregNeedsSelection = !in_array($survey->treg, $validTregs);
@endphp
<style>
    .field-needs-selection {
        border-color: #F64E60 !important;
        box-shadow: 0 0 0 0.2rem rgba(246, 78, 96, 0.15) !important;
    }

    .disabled-score {
        background-color: #F3F6F9 !important;
        color: #7E8299 !important;
        cursor: not-allowed;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap">
                <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Hasil Survey CSS</h5>
            </div>
            <a href="{{ url('/dashboard-css?year=' . $survey->created_at->format('Y')) }}" class="btn btn-light-danger font-weight-bolder btn-sm">
                Kembali
            </a>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ $survey->nama }}</h3>
                    </div>
                </div>
                <form action="{{ route('hasil-survey-css.update', $survey->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-6">Data Responden</h5>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Nama Responden</label>
                                <input type="text" name="nama" class="form-control" value="{{ $survey->nama }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>No. HP</label>
                                <input type="text" name="hp" class="form-control" value="{{ $survey->hp }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $survey->email }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Perusahaan</label>
                                <input type="text" name="perusahaan" class="form-control" value="{{ $survey->perusahaan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Bidang</label>
                                <input type="text" name="bidang" class="form-control" value="{{ $survey->bidang }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <select name="status" class="form-control {{ $statusNeedsSelection ? 'field-needs-selection' : '' }}" required>
                                    @if($statusNeedsSelection)
                                        <option value="" selected>Pilih Status</option>
                                    @endif
                                    <option value="Telkom" {{ $survey->status === 'Telkom' ? 'selected' : '' }}>Telkom</option>
                                    <option value="Non-Telkom" {{ $survey->status === 'Non-Telkom' ? 'selected' : '' }}>Non-Telkom</option>
                                </select>
                                @if($statusNeedsSelection)
                                    <span class="form-text text-danger">Status lama: {{ $survey->status ?: '-' }}. Pilih Telkom atau Non-Telkom.</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label>TREG</label>
                                <select name="treg" class="form-control {{ $tregNeedsSelection ? 'field-needs-selection' : '' }}" required>
                                    @if($tregNeedsSelection)
                                        <option value="" selected>Pilih TREG</option>
                                    @endif
                                    @for($i = 1; $i <= 7; $i++)
                                        <option value="TREG {{ $i }}" {{ $survey->treg === 'TREG ' . $i ? 'selected' : '' }}>TREG {{ $i }}</option>
                                    @endfor
                                </select>
                                @if($tregNeedsSelection)
                                    <span class="form-text text-danger">TREG lama: {{ $survey->treg ?: '-' }}. Pilih TREG yang benar.</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label>Lokasi Lab</label>
                                <select name="lab" class="form-control">
                                    @foreach(['Lab Medan', 'Lab Jakarta', 'Lab Surabaya', 'Lab Makassar'] as $lab)
                                        <option value="{{ $lab }}" {{ $survey->lab === $lab ? 'selected' : '' }}>{{ $lab }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-8"></div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="font-weight-bold mb-6">Harapan</h5>
                                <div class="row">
                                    @for($i = 1; $i <= 20; $i++)
                                        <div class="form-group col-6 col-md-4">
                                            <label>Harapan {{ $i }}</label>
                                            <input type="number" min="1" max="5" name="h{{ $i }}" class="form-control disabled-score" value="{{ $survey->{'h' . $i} }}" readonly tabindex="-1">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="font-weight-bold mb-6">Kenyataan</h5>
                                <div class="row">
                                    @for($i = 1; $i <= 20; $i++)
                                        <div class="form-group col-6 col-md-4">
                                            <label>Kenyataan {{ $i }}</label>
                                            <input type="number" min="1" max="5" name="k{{ $i }}" class="form-control disabled-score" value="{{ $survey->{'k' . $i} }}" readonly tabindex="-1">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Saran</label>
                            <textarea name="saran" class="form-control disabled-score" rows="4" readonly tabindex="-1">{{ $survey->saran }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <a href="{{ url('/dashboard-css?year=' . $survey->created_at->format('Y')) }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
