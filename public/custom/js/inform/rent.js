let path = "dashboard/inform/rent";

$(document).on("click", ".create", function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    $('#add-modal input[name="id"]').val(id);
    $("#add-modal").modal("show");
});

$(document).on("click", ".add", function (e) {
    // console.log('test');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let rent = $('#add-modal input[name="rent"]').val();
    let fee = $('#add-modal input[name="fee"]').val();
    let id = $('#add-modal input[name="id"]').val();
    let form = new FormData();
    form.append("fee", fee);
    form.append("rent", rent);
    form.append("id_post_car", id);
    $.ajax({
        url: `${baseUrl}/${path}`,
        method: "POST",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (data) {
            if (data.status == "true") {
                $("#add-modal").modal("hide");
                Swal.fire(data.title, data.description, data.icon).then(
                    function () {
                        location.reload();
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            } else {
                toastr.clear();
                NioApp.Toast(
                    "<h5>" +
                        data.title +
                        "</h5><p>" +
                        data.description +
                        "</p>",
                    data.icon,
                    {
                        position: "top-right",
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }
        },
    });

    return false;
});
$(document).on("click", ".update", function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
        url: `${baseUrl}/${path}/${id}/edit`,
        method: "GET",
        success: function (response) {
            if (response.status === "true") {
                let data = response.data;
                $('#change-modal input[name="rent"]').val(data.rent);
                $('#change-modal input[name="fee"]').val(data.fee);
                $('#change-modal input[name="id"]').val(data.id);

                $("#change-modal").modal("show");
            } else {
                Swal.fire(
                    "Error",
                    "An error occurred while retrieving FAQ data.",
                    "error"
                );
            }
        },
        error: function () {
            Swal.fire(
                "Error",
                "An error occurred while retrieving FAQ data.",
                "error"
            );
        },
    });
});

$(document).on("click", ".save", function (e) {
    e.preventDefault();
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let rent = $('#change-modal input[name="rent"]').val();
    let id = $('#change-modal input[name="id"]').val();
    let fee = $('#change-modal input[name="fee"]').val();
    let form = new FormData();
    form.append("rent", rent);
    form.append("fee", fee);
    form.append("_method", "PUT");

    $.ajax({
        url: `${baseUrl}/${path}/${id}`,
        method: "POST",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (data) {
            if (data.status === "true") {
                $("#change-modal").modal("hide");
                Swal.fire({
                    title: data.title,
                    text: data.description,
                    icon: data.icon,
                }).then(function () {
                    location.reload();
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            } else {
                toastr.clear();
                NioApp.Toast(
                    "<h5>" +
                        data.title +
                        "</h5><p>" +
                        data.description +
                        "</p>",
                    data.icon,
                    {
                        position: "top-right",
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }
        },
    });

    return false;
});
