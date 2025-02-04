$(document).ready(function() {
    (function($) {
        $(".tab ul.tabs").addClass("active").find("> li:eq(0)").addClass("current");

        $(".tab ul.tabs li a").click(function(g) {
            var tab = $(this).closest(".tab"),
                index = $(this).closest("li").index();

            tab.find("ul.tabs > li").removeClass("current");
            $(this).closest("li").addClass("current");

            tab
                .find(".tab_content")
                .find("div.tabs_item")
                .not("div.tabs_item:eq(" + index + ")")
                .slideUp();
            tab
                .find(".tab_content")
                .find("div.tabs_item:eq(" + index + ")")
                .slideDown();

            g.preventDefault();
        });
    })(jQuery);
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});


$('#reset_password').validate({
    rules: {
        password: {
            required: true,
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        },
    },
    messages: {
        password: "Password field is required",
        password_confirmation: {
            required: "Password Confirmation field is required",
            equalTo: "New password and confirm password is not matching",
        },

    },
    errorElement: 'span',
    submitHandler: function(form,event) {
        //
        var formData = new FormData($(form)[0]);
        $('.msg').html(``);
        $('.error').html('');
        var submitButton=$(form).find('[type=submit]');
        var current_btn_text=submitButton.html();
        button_loading_text = 'Updating...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val()+'/profile/reset-password',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    `+button_loading_text+`
                `).attr('disabled',true);
            },
            success: function(response)
            {
                if(response.status){
                    showMessage('success',response.message);
                    $('#reset_password').trigger("reset");
                } else {
                    showMessage('danger',response.message);
                }
            },

            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled',false);
                if(response.responseJSON.errors){
                    $.each(response.responseJSON.errors, function(i,v) {
                        element=$(form).find('[name='+i+']');
                        element.addClass('is-invalid');
                        if( $(form).find('#'+ i +'-error').length){
                            $(form).find('#'+ i +'-error').html(v).show();
                        }else{
                            element.closest('.form-group').
                            append(`<span id="`+i+`-error" class="error invalid-feedback">`+v+`</span>`);
                            $('#'+i+'-error').show();
                        }
                        element.attr('aria-invalid',true);
                        element.attr("area-describedby",i+"-error");
                        element.focus();
                        $('.error').show();
                    });
                }
                else{
                    showMessage('warning','Something went wrong...');
                }
            },
            complete:function(){
                submitButton.html(current_btn_text).attr('disabled',false);
            }
        });
        event.preventDefault();
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    errorPlacement: function(label, element) {
        console.log(label);

        if (element.hasClass('web-select2')) {
          label.insertAfter(element.next('.select2-container')).addClass('mt-2');
          select2label = label
        }
         else {
          label.addClass('mt-2');
          label.insertAfter(element);
        }
      },
});

$('#edit_details').validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
        },
        // phone: {
        //     required: true,
        //     minlength: 10,
        //     maxlength: 10
        // },
        // address: {
        //     required: true,
        // },
        // image: {
        //     required: true,
        // },
    },
    messages: {
        name: "Name field is required",
        email: {
            required: "Email field is required",
            email: "Please enter a valid email address.",
        },
        phone: {
            required: "Phone field is required",
            minlength: "Phone number must be 10 digits",
            maxlength: "Phone number must be 10 digits",
        },
        address: "Address field is required",
        image: "Image field is required",

    },
    errorElement: 'span',
    submitHandler: function(form,event) {
        //
        var formData = new FormData($(form)[0]);
        $('.msg').html(``);
        $('.error').html('');
        var submitButton=$(form).find('[type=submit]');
        var current_btn_text=submitButton.html();
        button_loading_text = 'Updating...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val()+'/profile/edit-details',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    `+button_loading_text+`
                `).attr('disabled',true);
            },
            success: function(response)
            {
                if(response.status){
                    showMessage('success',response.message);
                    var src = response.user.image;
					document.getElementById("profile_image").src = src;
					document.getElementById("header-profile-image").src = src;
                    $('#user_name').html(response.user.name);
                    $('#header_user_name').html(response.user.name);
                    $('#user_email').html(response.user.email);
                    $('#header_user_email').html(response.user.email);
                    // $('#user_phone').html(response.user.phone);
                    // $('#user_address').html(response.user.address);
                } else {
                    showMessage('danger',response.message);
                }
            },

            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled',false);
                if(response.responseJSON.errors){
                    $.each(response.responseJSON.errors, function(i,v) {
                        element=$(form).find('[name='+i+']');
                        element.addClass('is-invalid');
                        if( $(form).find('#'+ i +'-error').length){
                            $(form).find('#'+ i +'-error').html(v).show();
                        }else{
                            element.closest('.form-group').
                            append(`<span id="`+i+`-error" class="error invalid-feedback">`+v+`</span>`);
                            $('#'+i+'-error').show();
                        }
                        element.attr('aria-invalid',true);
                        element.attr("area-describedby",i+"-error");
                        element.focus();
                        $('.error').show();
                    });
                }
                else{
                    showMessage('warning','Something went wrong...');
                }
            },
            complete:function(){
                submitButton.html(current_btn_text).attr('disabled',false);
            }
        });
        event.preventDefault();
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    errorPlacement: function(label, element) {
        console.log(label);

        if (element.hasClass('web-select2')) {
          label.insertAfter(element.next('.select2-container')).addClass('mt-2');
          select2label = label
        }
         else {
          label.addClass('mt-2');
          label.insertAfter(element);
        }
    },
});

document.addEventListener("DOMContentLoaded", function () {

    const toggle2FA = document.getElementById("enable_2fa");

    if (toggle2FA) {
        toggle2FA.addEventListener("change", function () {
            const userId = this.getAttribute("data-user-id");
            const isChecked = this.checked;
            const statusText = document.getElementById("2fa_status_text");

            // Determine the endpoint
            const endpoint = isChecked
                ? $('#route-for-user').val() + '/profile/enable-admin-2fa'
                : $('#route-for-user').val() + '/profile/disable-admin-2fa';

            // Send AJAX request
            fetch(endpoint, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ user_id: userId }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status) {
                        statusText.textContent = isChecked ? "Enabled" : "Disabled";

                        if (isChecked && data.qr_code) {
                            // Display the QR code in a popup
                            showQRCodePopup(data.qr_code);
                        }
                        showMessage('success',"Two-Factor Authentication has been " + (isChecked ? "enabled" : "disabled") + ".");
                    } else {
                        throw new Error(data.message || "An error occurred.");
                    }
                })
                .catch((error) => {
                    this.checked = !isChecked; // Revert toggle if error occurs
                    showMessage('danger',"Failed to update 2FA. Please try again.");
                });
        });
    }

    // Function to show QR Code in a popup
    function showQRCodePopup(qrCode) {
        // Create the popup container
        const popup = document.createElement("div");
        popup.style.position = "fixed";
        popup.style.top = "50%";
        popup.style.left = "50%";
        popup.style.transform = "translate(-50%, -50%)";
        popup.style.backgroundColor = "#fff";
        popup.style.padding = "20px";
        popup.style.boxShadow = "0px 0px 10px rgba(0, 0, 0, 0.5)";
        popup.style.zIndex = "1000";

        // Add QR Code image
        const qrImage = document.createElement("img");
        qrImage.src = qrCode;
        qrImage.alt = "2FA QR Code";
        qrImage.style.width = "200px";
        qrImage.style.height = "200px";

        // Add close button
        const closeButton = document.createElement("button");
        closeButton.textContent = "Close";
        closeButton.style.marginTop = "10px";
        closeButton.style.display = "block";
        closeButton.style.marginLeft = "auto";
        closeButton.style.marginRight = "auto";
        closeButton.classList.add("form-control");
        closeButton.addEventListener("click", () => {
            document.body.removeChild(popup);
        });

        // Append elements to popup
        popup.appendChild(qrImage);
        popup.appendChild(closeButton);

        // Add popup to the body
        document.body.appendChild(popup);
    }
});

