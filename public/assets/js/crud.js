$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
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
function acceptData(link, item) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin akan menerima data pengajuan dari ' + item + ' ?',
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
                type: "PATCH",
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
                'Anda batal menerima data pengajuan',
                'error'
            )
        }
    });
}
function declineData(link, item) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin akan menolak data pengajuan dari ' + item + ' ?',
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
                type: "PATCH",
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
                'Anda batal menolak data pengajuan ini',
                'error'
            )
        }
    });
}
