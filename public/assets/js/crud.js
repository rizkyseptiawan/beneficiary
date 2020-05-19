$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/* attach a submit handler to the form */
$("#create-form").submit(function (event) {
    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $form = $(this),
        url = $form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            toastr.success(response.message, "Berhasil", {
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
            $form.trigger("reset");
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            toastr.error(err.message, "Gagal", {
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
            // alert(" Can't do because: " + xhr.responseText.message);
        },
    });
});
/* attach a submit handler to the form */
$("#update-form").submit(function (event) {
    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $form = $(this),
        url = $form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            toastr.success(response.message, "Berhasil", {
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            toastr.error(err.message, "Gagal", {
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
            // alert(" Can't do because: " + xhr.responseText.message);
        },
    });
});

function deleteData(link, item) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin akan menghapus data ' + item + ' ?',
        text: "Anda tidak dapat mengembalikan ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Lanjutkan',
        cancelButtonText: 'Batalkan',
        reverseButtons: true
    }).then((result) => {
        var url = link;
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: url,
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                        )
                        location.reload();
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Gagal',
                            response.message,
                            'error'
                        )
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    iziToast.error({
                        title : 'Gagal',
                        message : err.message,
                        position : 'topRight',
                    });
                },
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Anda batal menghapus data',
                'error'
            )
        }
    });
}
function verificationData(link, item) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin akan memverifikasi data ' + item + ' ?',
        text: "Anda tidak dapat mengembalikan ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Lanjutkan',
        cancelButtonText: 'Batalkan',
        reverseButtons: true
    }).then((result) => {
        var url = link;
        if (result.value) {
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                        )
                        var oTable = $('table').dataTable();
                        oTable.fnDraw(true);
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Gagal',
                            response.message,
                            'error'
                        )
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    toastr.error(err.message, "Gagal", {
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                },
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Anda batal memverifikasi data',
                'error'
            )
        }
    });
}

function unverificationData(link, item) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin tidak akan memverifikasi data ' + item + ' ?',
        text: "Anda tidak dapat mengembalikan ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Lanjutkan',
        cancelButtonText: 'Batalkan',
        reverseButtons: true
    }).then((result) => {
        var url = link;
        if (result.value) {
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                        )
                        var oTable = $('table').dataTable();
                        oTable.fnDraw(true);
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Gagal',
                            response.message,
                            'error'
                        )
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    toastr.error(err.message, "Gagal", {
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                },
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Anda batal memverifikasi data',
                'error'
            )
        }
    });
}
