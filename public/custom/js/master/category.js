let path = "dashboard/master/category";
function createTextSlug() {
    var name = $("#name").val();
    $("#slug").val(generateSlug(name));
}

function createTextSlugUpdate() {
    var newName = $("#newName").val();
    $("#newSlug").val(generateSlug(newName));
}

function generateSlug(text) {
    return text
        .toString()
        .toLowerCase()
        .replace(/^-+/, "")
        .replace(/-+$/, "")
        .replace(/\s+/g, "-")
        .replace(/\-\-+/g, "-")
        .replace(/[^\w\-]+/g, "");
}
$(document).on("click", ".create", function (e) {
    e.preventDefault();
    $("#add-modal").modal("show");
});

$(document).on("click", ".add", function (e) {
    // console.log('test');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let name = $('#add-modal input[name="name"]').val();
    let slug = $('#add-modal input[name="slug"]').val();
    let image = $('#add-modal input[name="image"]').prop("files")[0];
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
    form.append("image", image);
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
    let slug = $(this).data("slug");
    $.ajax({
        url: `${baseUrl}/${path}/${slug}/edit`,
        method: "GET",
        success: function (response) {
            if (response.status === "true") {
                let data = response.data;
                console.log(data.image);
                $('#change-modal input[name="name"]').val(data.name);
                $('#change-modal input[name="slug"]').val(data.slug);
                // $('#change-modal input[name="image"]').val(data.image);

                // Menyimpan slug asli sebelum pembaruan
                $('#change-modal input[name="id"]').val(data.id);

                $("#change-modal").modal("show");
            } else {
                Swal.fire(
                    "Error",
                    "An error occurred while retrieving Category data.",
                    "error"
                );
            }
        },
        error: function () {
            Swal.fire(
                "Error",
                "An error occurred while retrieving Category data.",
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
    let slug = $('#change-modal input[name="slug"]').val();
    let image = $('#change-modal input[name="image"]').prop("files")[0];
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
    if (image) {
        form.append("image", image);
    }
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
