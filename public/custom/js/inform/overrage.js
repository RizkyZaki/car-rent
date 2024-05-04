let path = "dashboard/inform/overrage";
$(document).on("click", ".create", function (e) {
    e.preventDefault();
    $("#add-modal").modal("show");
});

$(document).on("click", ".add", function (e) {
    // console.log('test');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let title = $('#add-modal input[name="title"]').val();
    let icon = $('#add-modal input[name="icon"]').prop("files")[0];
    let description = $('#add-modal textarea[name="description"]').val();
    let form = new FormData();
    form.append("title", title);
    form.append("icon", icon);
    form.append("description", description);
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
                $('#change-modal input[name="title"]').val(data.title);
                $('#change-modal input[name="icon"]').val(data.icon);
                $('#change-modal textarea[name="description"]').val(
                    data.description
                );

                // Menyimpan slug asli sebelum pembaruan
                $('#change-modal input[name="id"]').val(data.id);

                $("#change-modal").modal("show");
            } else {
                Swal.fire(
                    "Error",
                    "An error occurred while retrieving Overrage data.",
                    "error"
                );
            }
        },
        error: function () {
            Swal.fire(
                "Error",
                "An error occurred while retrieving Overrage data.",
                "error"
            );
        },
    });
});

$(document).on("click", ".save", function (e) {
    e.preventDefault();
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let name = $('#change-modal input[name="name"]').val();
    let id = $('#change-modal input[name="id"]').val();
    let icon = $('#change-modal input[name="icon"]').prop("files")[0];
    let description = $('#add-modal textarea[name="description"]').val();

    let form = new FormData();
    form.append("name", name);
    form.append("icon", icon);
    form.append("description", description);
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
