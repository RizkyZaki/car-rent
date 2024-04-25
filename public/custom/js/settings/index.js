let path = "dashboard/settings";
$(".tags-select2").select2({
    multiple: true,
    tags: true,
});
$(document).on("click", ".save", function (e) {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let name = $('input[name="name"]').val();
    let description = $('input[name="description"]').val();
    let keyword = $('input[name="keyword"]').val();
    let overrage_text = $('input[name="overrage_text"]').val();
    let phone = $('input[name="phone"]').val();
    let contact_phone = $('input[name="contact_phone"]').val();
    let email = $('input[name="email"]').val();
    let text_copyright = $('input[name="text_copyright"]').val();
    let logo = $('input[name="logo"]').prop("files")[0];
    let overrage_image = $('input[name="overrage_image"]').prop("files")[0];
    let benefit = $('select[name="benefit[]"]').val();
    let form = new FormData();
    form.append("name", name);
    form.append("logo", logo);
    form.append("keyword", keyword);
    form.append("description", description);
    form.append("overrage_text", overrage_text);
    form.append("phone", phone);
    form.append("contact_phone", contact_phone);
    form.append("email", email);
    form.append("text_copyright", text_copyright);
    form.append("overrage_image", overrage_image);
    form.append("benefit", benefit);
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
});
