"use strict";
var KTDatatablesCombined = function() {
    var t1, t2, t3, e1, e2, e3;
    return {
        init: function() {
            (t1 = document.querySelector("#kt_datatable_example")) && (t1.querySelectorAll("tbody tr").forEach((t=>{
                const e1 = t.querySelectorAll("td")
                  , a1 = moment(e1[3].innerHTML, "DD MMM YYYY, LT").format();
                e1[3].setAttribute("data-order", a1)
            }
            )),
            e1 = $(t1).DataTable({
                info: !1,
                order: [],
                pageLength: 10
            }));

            (t2 = document.querySelector("#KT_datatable_example_2")) && (t2.querySelectorAll("tbody tr").forEach((t=>{
                const e2 = t.querySelectorAll("td")
                  , a2 = moment(e2[3].innerHTML, "DD MMM YYYY, LT").format();
                e2[3].setAttribute("data-order", a2)
            }
            )),
            e2 = $(t2).DataTable({
                info: !1,
                order: [],
                pageLength: 10
            }));

            (t3 = document.querySelector("#kt_datatable_example_3")) && (t3.querySelectorAll("tbody tr").forEach((t=>{
                const e3 = t.querySelectorAll("td")
                  , a3 = moment(e3[3].innerHTML, "DD MMM YYYY, LT").format();
                e3[3].setAttribute("data-order", a3)
            }
            )),
            e3 = $(t3).DataTable({
                info: !1,
                order: [],
                pageLength: 10
            }));

            (()=>{
                const e = "Booking Order Lab Kalibrasi Jakarta";

                new $.fn.dataTable.Buttons(t1,{
                    buttons: [{
                        extend: "copyHtml5",
                        title: e
                    }, {
                        extend: "excelHtml5",
                        title: e
                    }, {
                        extend: "csvHtml5",
                        title: e
                    }, {
                        extend: "pdfHtml5",
                        title: e
                    }]
                }).container().appendTo($("#kt_datatable_example_buttons"));

                new $.fn.dataTable.Buttons(t2,{
                    buttons: [{
                        extend: "copyHtml5",
                        title: e
                    }, {
                        extend: "excelHtml5",
                        title: e
                    }, {
                        extend: "csvHtml5",
                        title: e
                    }, {
                        extend: "pdfHtml5",
                        title: e
                    }]
                }).container().appendTo($("#KT_datatable_example_2_buttons"));

                new $.fn.dataTable.Buttons(t3,{
                    buttons: [{
                        extend: "copyHtml5",
                        title: e
                    }, {
                        extend: "excelHtml5",
                        title: e
                    }, {
                        extend: "csvHtml5",
                        title: e
                    }, {
                        extend: "pdfHtml5",
                        title: e
                    }]
                }).container().appendTo($("#kt_datatable_example_3_buttons"));

                document.querySelectorAll("#kt_datatable_example_export_menu [data-kt-export]").forEach((t=>{
                    t.addEventListener("click", (t=>{
                        t.preventDefault();
                        const e = t.target.getAttribute("data-kt-export");
                        document.querySelector(".dt-buttons .buttons-" + e).click()
                    }
                    ))
                }));

                document.querySelectorAll("#KT_datatable_example_2_export_menu [data-kt-export]").forEach((t=>{
                    t.addEventListener("click", (t=>{
                        t.preventDefault();
                        const e = t.target.getAttribute("data-kt-export");
                        document.querySelector(".dt-buttons .buttons-" + e).click()
                    }
                    ))
                }));

                document.querySelectorAll("#kt_datatable_example_3_export_menu [data-kt-export]").forEach((t=>{
                    t.addEventListener("click", (t=>{
                        t.preventDefault();
                        const e = t.target.getAttribute("data-kt-export");
                        document.querySelector(".dt-buttons .buttons-" + e).click()
                    }
                    ))
                }));
            }
            )();

            document.querySelectorAll('[data-kt-filter="search"]').forEach((filterInput) => {
                filterInput.addEventListener("keyup", (function(t) {
                    e1.search(t.target.value).draw();
                }));
            });
            document.querySelectorAll('[data-kt-filter2="search2"]').forEach((filterInput) => {
                filterInput.addEventListener("keyup", (function(t) {
                    e2.search(t.target.value).draw();
                }));
            });
            document.querySelectorAll('[data-kt-filter3="search3"]').forEach((filterInput) => {
                filterInput.addEventListener("keyup", (function(t) {
                    e3.search(t.target.value).draw();
                }));
            });
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTDatatablesCombined.init()
}));