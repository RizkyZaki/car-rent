let path = "dashboard/master/faq";
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
$(document).on("click", ".create", function (e) {
    e.preventDefault();
    $("#add-modal").modal("show");
});

$(document).on("click", ".add", function (e) {
    // console.log('test');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let answer = $('#add-modal textarea[name="answer"]').val();
    let question = $('#add-modal input[name="question"]').val();
    let form = new FormData();
    form.append("question", question);
    form.append("answer", answer);
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
                console.log(data.name);
                $('#change-modal input[name="question"]').val(data.question);
                $('#change-modal textarea[name="answer"]')
                    .val(data.answer)
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

                // Menyimpan slug asli sebelum pembaruan
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
    let question = $('#change-modal input[name="question"]').val();
    let id = $('#change-modal input[name="id"]').val();
    let answer = $('#change-modal textarea[name="answer"]').val();
    let form = new FormData();
    form.append("question", question);
    form.append("answer", answer);
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
