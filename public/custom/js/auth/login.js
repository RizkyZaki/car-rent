let path = "login";
$(".form-control").keyup(function (e) {
    if (e.keyCode === 13) {
        $('button[name="login"]').click();
    }
});

$(document).on("click", ".switch-icon", function () {
    if ($(this).hasClass("ni-eye")) {
        $(this).removeClass("ni-eye");
        $(this).addClass("ni-eye-off");
        $('input[name="password"]').attr("type", "password");
    } else {
        $(this).removeClass("ni-eye-off");
        $(this).addClass("ni-eye");
        $('input[name="password"]').attr("type", "text");
    }
});
$(document).on("click", ".login", function (e) {
    e.preventDefault();

    let email = $("#email").val();
    let password = $("#password").val();
    let spinner = $(this).find(".spinner-border");
    spinner.removeClass("visually-hidden");
    $(this).attr("disabled", "disabled");

    let formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    formData.append("_token", csrfToken);

    $.ajax({
        url: `${baseUrl}/${path}`,
        method: "POST",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            if (data.status == "true") {
                Swal.fire({
                    title: data.title,
                    text: data.description,
                    icon: data.icon,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                    didOpen: () => {
                        Swal.showLoading();
                        const timerInterval = setInterval(() => {
                            const content = Swal.getContent();
                            if (content) {
                                const progressBar =
                                    content.querySelector("progress");
                                if (progressBar) {
                                    progressBar.value += 20;
                                }
                            }
                        }, 400);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    },
                    onClose: () => {
                        window.location = `${baseUrl}/dashboard/overview`;
                    },
                });
            } else {
                Swal.fire(data.title, data.description, data.icon);
            }
        },
        complete: function () {
            spinner.addClass("visually-hidden");
            $(".login").removeAttr("disabled");
        },
    });
});
