let path = "dashboard/inform/profile";
function texteditor() {
    $("textarea.summernote").summernote({
        placeholder: "Description",
        tabsize: 2,
        height: 150,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            ["font", ["strikethrough", "superscript", "subscript"]],
            ["fontname", ["fontname"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
        ],
    });
}
$(document).ready(function () {
    texteditor();
});
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
    let description = $('#add-modal textarea[name="description"]').val();
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
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
    let slug = $(this).data("slug");
    $.ajax({
        url: `${baseUrl}/${path}/${slug}/edit`,
        method: "GET",
        success: function (response) {
            if (response.status === "true") {
                let data = response.data;
                $('#change-modal input[name="name"]').val(data.name);
                $('#change-modal textarea[name="description"]')
                    .val(data.description)
                    .summernote({
                        placeholder: "Description",
                        tabsize: 2,
                        height: 150,
                        toolbar: [
                            ["style", ["style"]],
                            ["font", ["bold", "italic", "underline", "clear"]],
                            [
                                "font",
                                ["strikethrough", "superscript", "subscript"],
                            ],
                            ["fontname", ["fontname"]],
                            ["fontsize", ["fontsize"]],
                            ["color", ["color"]],
                            ["para", ["ul", "ol", "paragraph"]],
                            ["height", ["height"]],
                        ],
                    });

                $('#change-modal input[name="slug"]').val(data.slug);

                // Menyimpan slug asli sebelum pembaruan
                $('#change-modal input[name="id"]').val(data.id);

                $("#change-modal").modal("show");
            } else {
                Swal.fire(
                    "Error",
                    "An error occurred while retrieving Profile data.",
                    "error"
                );
            }
        },
        error: function () {
            Swal.fire(
                "Error",
                "An error occurred while retrieving Profile data.",
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
    let description = $('#change-modal textarea[name="description"]').val();
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
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
