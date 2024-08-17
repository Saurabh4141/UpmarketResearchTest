$(document).ready(function () {
    getData();
    $("#roles").select2({
        placeholder: 'Select Role'
    });

    $(document).on('change', "#SelectAll", function () {
        let isChecked = $(this).prop('checked')
        $('.chk_class').prop('checked', isChecked)
    })

    $(document).on("submit", "#createUserForm", function (e) {
        e.preventDefault();
        let name = $("#name").val().trim();
        if (name == null || name == "") {
            Swal.fire(
                "Error!",
                "Name is empty or undefined..!",
                "error"
            );
            return false;
        } else {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                method: "POST",
                url: baseUrl + "/user/create",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $("#loader").removeClass("d-none");
                    $("#btn_submit").prop("disabled", true);
                },
                success: function (data) {
                    // console.log(data);
                    if (data.hasOwnProperty("success")) {
                        $("#createUserForm")[0].reset();
                        $("#roles").val("").trigger('change');
                        Swal.fire({
                            title: "Success!",
                            text: data.success,
                            icon: "success",
                        });
                    } else {
                        Swal.fire("Error!", data.error, "error");
                    }
                },
                complete: function () {
                    $("#loader").addClass("d-none");
                    $("#btn_submit").prop("disabled", false);
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire("Error!", "Something went wrong..!", "error");
                },
            });
        }
    });
    $(document).on("submit", "#updateUserForm", function (e) {
        e.preventDefault();
        let filename = $("#filename").val().trim();
        if (filename == null || filename == "") {
            Swal.fire(
                "Error!",
                "Filename is empty or undefined..!",
                "error"
            );
            return false;
        } else {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                method: "POST",
                url: baseUrl + "/user/update",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $("#loader").removeClass("d-none");
                    $("#btn_submit").prop("disabled", true);
                },
                success: function (data) {
                    // console.log(data);
                    if (data.hasOwnProperty("success")) {
                        $("#updateUserModal").modal("hide");
                        getData();
                        Swal.fire({
                            title: "Success!",
                            text: data.success,
                            icon: "success",
                        }).then((ok) => {
                            if (ok) {
                            }
                        });
                    } else {
                        Swal.fire("Error!", data.error, "error");
                    }
                },
                complete: function () {
                    $("#loader").addClass("d-none");
                    $("#btn_submit").prop("disabled", false);
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire("Error!", "Something went wrong..!", "error");
                },
            });
        }
    });

    $(document).on('click', '#btn_deletejson', function (e) {
        e.preventDefault();
        let arr_filename = $("input:checkbox[name='inp_filename']:checked").map(function () {
            return $(this).val();
        }).get();

        if (arr_filename.length <= 0) {
            Swal.fire("Warning!", "Please select checkbox to proceed..!", "warning");
            return false;
        } else {
            Swal.fire({
                title: "Are you sure?",
                text: "This Json will be deleted permanently...!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Yes',
                focusConfirm: false,
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: baseUrl + "/user/permanentdelete",
                        type: "POST",
                        data: {
                            arr_filename,
                        },
                        beforeSend: function () {
                            $("#loader").removeClass("d-none");
                        },
                        success: function (data) {
                            if (data.hasOwnProperty("success")) {
                                getData();
                                Swal.fire({
                                    title: "Success!",
                                    text: data.success,
                                    icon: "success",
                                });
                            } else {
                                Swal.fire("Error!", data.error, "error");
                            }
                        },
                        complete: function () {
                            $("#loader").addClass("d-none");
                        },
                        error: function (error) {
                            console.log(error);
                            Swal.fire({
                                title: "Error !",
                                text: "Something went wrong.!",
                                icon: "error",
                            });
                        },
                    });
                }
            });
        }
    })
});

function getData() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/user/list",
        type: "POST",
        data: {},
        beforeSend: function () {
            $("#loader").removeClass("d-none");
        },
        success: function (data) {
            $("#tableData").empty().html(data);
            $('[data-bs-toggle="tooltip"]').tooltip();

            var Table = $("#Table").DataTable({
                info: true,
                paging: true,
                pageLength: 10,
            });

            var RecordCount = Table.rows().count();

            $("#SearchInDatatable").keyup(function (e) {
                e.preventDefault();
                Table.search($(this).val()).draw();
            });

            $("#PageLength").change(function (e) {
                e.preventDefault();
                Table.page.len($(this).val()).draw();
            });

            $("#sel_role").change(function (e) {
                e.preventDefault();
                Table.columns('.col_role').search($(this).val()).draw();
            });
        },
        complete: function () {
            $("#loader").addClass("d-none");
        },
        error: function (error) {
            console.log(error);
            Swal.fire("Error!", "Something went wrong..", "error");
        },
    });
}

function updateUser(filename) {
    $("#updateUserModal").modal("hide");
    if (filename == "" || filename == null) {
        Swal.fire("Error!", "Filename is empty or undefined", "error");
        return false;
    } else {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: baseUrl + "/user/update",
            type: "GET",
            data: {
                filename: filename,
            },
            beforeSend: function () {
                $("#loader").removeClass("d-none");
            },
            success: function (data) {
                // console.log(data);
                if (data.hasOwnProperty("error")) {
                    Swal.fire("Error!", data.error, "error");
                } else {
                    $("#IncludeModal").empty().html(data);
                    $("#updateUserModal").modal("show");
                    $("#roles").select2({
                        placeholder: 'Select Role'
                    });

                }
            },
            complete: function () {
                $("#loader").addClass("d-none");
            },
            error: function (error) {
                console.log(error);
                Swal.fire({
                    title: "Error !",
                    text: "Something went wrong.!",
                    icon: "error",
                });
            },
        });
    }
}

function deleteUser(filename) {
    if (filename == "" || filename == null) {
        Swal.fire("Error!", "Filename is empty or undefined", "error");
        return false;
    } else {
        Swal.fire({
            title: "Are you sure?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Yes',
            focusConfirm: false,
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: baseUrl + "/user/delete",
                    type: "POST",
                    data: {
                        filename: filename,
                    },
                    beforeSend: function () {
                        $("#loader").removeClass("d-none");
                    },
                    success: function (data) {
                        if (data.hasOwnProperty("success")) {
                            getData();
                            Swal.fire({
                                title: "Success!",
                                text: data.success,
                                icon: "success",
                            });
                        } else {
                            Swal.fire("Error!", data.error, "error");
                        }
                    },
                    complete: function () {
                        $("#loader").addClass("d-none");
                    },
                    error: function (error) {
                        console.log(error);
                        Swal.fire({
                            title: "Error !",
                            text: "Something went wrong.!",
                            icon: "error",
                        });
                    },
                });
            }
        });
    }
}
