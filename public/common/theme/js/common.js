function showMessage(type,message){
    switch(type){
        case 'success':alertify.success(message);break;
        case 'info':alertify.message(message);break;
        case 'warning':alertify.warning(message);break;
        case 'danger':alertify.error(message);break;
        case 'primary':alertify.primary(message);break;
        case 'secondary':alertify.secondary(message);break;
    }
}

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

var BASE_URL=$('#base-route').val();
var ADMIN_BASE_URL=$('#route-for-user').val();

$('#news-letter-add-form').validate({
    rules: {
        news_letter_email: {
            required: true,
        },
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Submitting...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#base-route').val() + '/submit-news-letter',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    `+ button_loading_text + `
                `).attr('disabled', true);
            },
            success: function (response) {
                if (response.status) {
                    showMessage('success', response.message);
                    $('#news-letter-add-form').trigger('reset');
                } else {
                    showMessage('warning', response.message);
                }
            },

            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (i, v) {
                        element = $(form).find('[name=' + i + ']');
                        element.addClass('is-invalid');
                        if ($(form).find('#' + i + '-error').length) {
                            $(form).find('#' + i + '-error').html(v).show();
                        } else {
                            element.closest('.form-group').
                                append(`<span id="` + i + `-error" class="error invalid-feedback">` + v + `</span>`);
                            $('.error').show();
                        }
                        element.attr('aria-invalid', true);
                        element.attr("area-describedby", i + "-error");
                        element.focus();
                    });
                }
                else {
                    showMessage('warning', 'Something went wrong...');
                }
            },
            complete: function () {
                submitButton.html(current_btn_text).attr('disabled', false);
            }
        });
        event.preventDefault();
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});

$('#contact-add-form').validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true
        },
        country: {
            required: true,
        },
        mobile: {
            required: true,
            digits: true,
            // minlength: 10
        },
    },
    messages: {
        name: "Please enter your name",
        email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address"
        },
        country: "Please select a country",
        mobile: {
            required: "Please enter your mobile number",
            digits: "Please enter only digits",
            minlength: "Please enter at least 10 digits"
        }
    },
    errorElement: 'span',
    errorClass: 'error invalid-feedback',
    errorPlacement: function(error, element) {
        // Place error message outside the .enquiry-form-inputparent div
        element.closest('.enquiry-form-inputparent').after(error);
    },
    submitHandler: function(form, event) {
        event.preventDefault();

        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        var button_loading_text = 'Submitting...';

        $.ajax({
            type: "POST",
            url: $('#base-route').val() + '/submit-contact-form',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span> ` + button_loading_text
                ).attr('disabled', true);
            },
            success: function(response) {
                if (response.status) {
                    showMessage('success', response.message); // Custom success message
                    $('#contact-add-form').trigger('reset');
                } else {
                    showMessage('warning', response.message); // Custom warning message
                }
            },
            error: function(response) {
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON && response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function(i, v) {
                        const element = $(form).find('[name="' + i + '"]');
                        element.addClass('is-invalid');

                        // Place the error outside the input wrapper
                        const errorHtml = `<span id="${i}-error" class="error invalid-feedback">${v}</span>`;
                        if (!$(form).find(`#${i}-error`).length) {
                            element.closest('.enquiry-form-inputparent').after(errorHtml);
                        }
                        element.attr('aria-invalid', true);
                        element.attr("aria-describedby", i + "-error");
                    });
                } else {
                    showMessage('error', 'Something went wrong...'); // Custom error message
                }
            },
            complete: function() {
                submitButton.html(current_btn_text).attr('disabled', false);
            }
        });
    },
    highlight: function(element) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element) {
        $(element).removeClass('is-invalid');
    }
});


// $(document).ready(function () {
    // Initialize form validation
    $('#career-add-form').validate({
        rules: {
            name: { required: true },
            email: { required: true, email: true },
            country: { required: true },
            mobile: { required: true, digits: true },
            branch: { required: true },
            department: { required: true },
            resume: { required: true }
        },
        messages: {
            name: "Please enter your name",
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            country: "Please select a country",
            mobile: {
                required: "Please enter your mobile number",
                digits: "Please enter only digits"
            },
            branch: "Please select a branch",
            department: "Please select a department",
            resume: "Please upload your resume"
        },
        errorElement: 'span',
        errorClass: 'error invalid-feedback',
        errorPlacement: function (error, element) {
            element.closest('.enquiry-form-inputparent').after(error);
        },
        submitHandler: function (form, event) {
            event.preventDefault();

            var formData = new FormData($(form)[0]);
            var submitButton = $(form).find('[type=submit]');
            var current_btn_text = submitButton.html();

            $.ajax({
                type: "POST",
                url: $('#base-route').val() + '/submit-career-form',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    submitButton.html(`<span class="spinner-border spinner-border-sm"></span> Submitting...`).attr('disabled', true);
                },
                success: function (response) {
                    if (response.status) {
                        showMessage('success', response.message);
                        $('#career-add-form').trigger('reset');
                    } else {
                        showMessage('warning', response.message);
                    }
                },
                error: function (response) {
                    submitButton.html(current_btn_text).attr('disabled', false);
                    if (response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function (i, v) {
                            const element = $(form).find('[name=' + i + ']');
                            element.addClass('is-invalid');
                            element.closest('.enquiry-form-inputparent').after(`<span class="error invalid-feedback">${v}</span>`);
                        });
                    } else {
                        showMessage('warning', 'Something went wrong...');
                    }
                },
                complete: function () {
                    submitButton.html(current_btn_text).attr('disabled', false);
                }
            });
        }
    });

    // Separate error removal on change or keyup
    $('#career-add-form input, #career-add-form select').on('keyup change', function () {
        const element = $(this);
        element.removeClass('is-invalid');
        element.siblings('.error').remove();
    });
// });



// Resume Validation: Dynamic Feedback
function handleFileChange() {
    const fileInput = document.getElementById('imageUploader');
    const errorSpan = document.getElementById('resume-error');
    if (fileInput.files.length > 0) {
        errorSpan.style.display = 'none';
    } else {
        errorSpan.style.display = 'block';
        errorSpan.textContent = 'Please upload your resume.';
    }
}


$('#career-add-form-new').validate({
    rules: {
        name_n: {
            required: true,
        },
        email_n: {
            required: true,
            email: true
        },
        country_n: {
            required: true,
        },
        mobile_n: {
            required: true,
            digits: true,
            // minlength: 10
        },
        branch_n: {
            required: true,
        },
        department_n: {
            required: true,
        },
        // message_n: {
        //     required: false,
        // },
        resume_n: {
            required: true,
        },
    },
    messages: {
        name_n: "Please enter your name",
        email_n: {
            required: "Please enter your email address",
            email: "Please enter a valid email address"
        },
        country_n: "Please select a country",
        mobile_n: {
            required: "Please enter your mobile number",
            digits: "Please enter only digits",
            minlength: "Please enter at least 10 digits"
        },
        branch_n: "Please select a branch",
        department_n: "Please select a department",
        // message_n: "Please enter your message",
        resume_n: "Please upload your resume",
    },
    errorElement: 'span',
    errorClass: 'error invalid-feedback',
    errorPlacement: function(error, element) {
        // Place error message outside the .enquiry-form-inputparent div
        element.closest('.enquiry-form-inputparent').after(error);
    },
    submitHandler: function(form, event) {
        event.preventDefault();

        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        var button_loading_text = 'Submitting...';

        // AJAX form submission
        $.ajax({
            type: "POST",
            url: $('#base-route').val() + '/submit-career-form-new',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span> ` + button_loading_text
                ).attr('disabled', true);
            },
            success: function(response) {
                if (response.status) {
                    showMessage('success', response.message);
                    $('#career-add-form-new').trigger('reset');
                    document.getElementById("jobenquirey").style.display = "none";;
                } else {
                    showMessage('warning', response.message);
                }
            },
            error: function(response) {
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function(i, v) {
                        const element = $(form).find('[name=' + i + ']');
                        element.addClass('is-invalid');
                        if ($(form).find('#' + i + '-error').length) {
                            $(form).find('#' + i + '-error').html(v).show();
                        } else {
                            // Place the error outside the input wrapper
                            element.closest('.enquiry-form-inputparent')
                                .after(`<span id="` + i + `-error" class="error invalid-feedback">` + v + `</span>`);
                        }
                        element.attr('aria-invalid', true);
                        element.attr("aria-describedby", i + "-error");
                        element.focus();
                    });
                } else {
                    showMessage('warning', 'Something went wrong...');
                }
            },
            complete: function() {
                submitButton.html(current_btn_text).attr('disabled', false);
            }
        });
    },
    highlight: function(element) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element) {
        $(element).removeClass('is-invalid');
    }
});


$('#eligibility-form').validate({
    rules: {
        first_name: { required: true },
        last_name: { required: true },
        email: { required: true, email: true },
        street_address: { required: true },
        city: { required: true },
        dob: { required: true, date: true },
        marital_status: { required: true },
        country: { required: true }, // Validation for country code
        mobile: {
            required: true,
            digits: true,
            // minlength: 10,
            maxlength: 15
        },
        highest_education_inside_can: { required: true },
        certificate_of_qualification: { required: true },
        country_of_studies: { required: true },
        language_test: {
            required: function () {
                return $('input[name="country_of_studies"]:checked').val() === 'Yes';
            }
        },
        speaking: {
            required: function () {
                return $('input[name="country_of_studies"]:checked').val() === 'Yes';
            }
        },
        reading: {
            required: function () {
                return $('input[name="country_of_studies"]:checked').val() === 'Yes';
            }
        },
        listening: {
            required: function () {
                return $('input[name="country_of_studies"]:checked').val() === 'Yes';
            }
        },
        writing: {
            required: function () {
                return $('input[name="country_of_studies"]:checked').val() === 'Yes';
            }
        },
        refused_or_cancelled_visa: { required: true },
        criminal_record: { required: true },
        family_relations_in_canada: { required: true },
        hear_about_canada: { required: true },
        detained: { required: true }
    },
    groups: {
        languageSkills: "speaking reading listening writing",
        contactInfo: "country mobile" // Group country and mobile
    },
    messages: {
        first_name: "First name is required.",
        last_name: "Last name is required.",
        email: {
            required: "Email is required.",
            email: "Enter a valid email address."
        },
        street_address: "Address is required.",
        city: "Citizenship is required.",
        dob: "Date of birth is required.",
        marital_status: "Select your marital status.",
        country: "Country code is required.", // Error message for country code
        mobile: {
            required: "Mobile number is required.",
            digits: "Enter a valid mobile number.",
            minlength: "Mobile number must be at least 10 digits.",
            maxlength: "Mobile number must not exceed 15 digits."
        },
        highest_education_inside_can: "Select your highest education level.",
        certificate_of_qualification: "Please select if you hold a Canadian education.",
        country_of_studies: "Please select if you have a valid language test result.",
        language_test: "Please select a language test.",
        speaking: "This field is required to fill out all language scores.",
        reading: "This field is required to fill out all language scores.",
        listening: "This field is required to fill out all language scores.",
        writing: "This field is required to fill out all language scores.",
        refused_or_cancelled_visa: "Please indicate if you had a visa refusal.",
        criminal_record: "Please indicate if you have any criminal records.",
        family_relations_in_canada: "Please indicate if you have family in Canada.",
        hear_about_canada: "Please select how you heard about us.",
        detained: "Additional information is required."
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        if (element.is(':radio') || element.is(':checkbox')) {
            error.appendTo(element.closest('.check-box-wrpr'));
        } else if (element.attr("name") === "speaking" ||
                   element.attr("name") === "reading" ||
                   element.attr("name") === "listening" ||
                   element.attr("name") === "writing") {
            error.insertAfter("#language-scores");
        } else if (element.attr("name") === "mobile") {
            // Move error message outside the section
            error.insertAfter(element.closest("section"));
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function (form, event) {
        event.preventDefault();
        var formData = new FormData($(form)[0]);
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        var button_loading_text = 'Submitting...';

        $.ajax({
            type: "POST",
            url: $('#base-route').val() + '/submit-eligibility-form',
            contentType: false,
            processData: false,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    ${button_loading_text}
                `).attr('disabled', true);
            },
            success: function (response) {
                if (response.status) {
                    showMessage('success', response.message);
                    $(form).trigger('reset');
                    const countryOfStudiesValue = $('input[name="country_of_studies"]:checked').val();
                    // if (countryOfStudiesValue === 'Yes') {
                    //     // Show the language test dropdown
                    //     $('#language-test').removeClass('hidden').addClass('flex');

                    //     // Optionally set the value of #which-lang if data is available in response
                    //     if (response.data && response.data.language_test) {
                    //         $('#which-lang').val(response.data.language_test).trigger('change');
                    //     }
                    // } else {
                        $('#language-test').addClass('hidden').removeClass('flex');
                        $('#language-scores').addClass('hidden').removeClass('flex');
                    // }
                } else {
                    showMessage('warning' , response.message);
                }
            },
            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON && response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (name, message) {
                        var field = $(form).find(`[name="${name}"]`);
                        var errorHtml = `<span class="error invalid-feedback">${message}</span>`;
                        if (field.is(':radio') || field.is(':checkbox')) {
                            field.closest('.check-box-wrpr').append(errorHtml);
                        } else {
                            field.after(errorHtml);
                        }
                        field.addClass('is-invalid');
                    });
                } else {
                    showMessage('error','Something went wrong.');
                }
            },
            complete: function () {
                submitButton.html(current_btn_text).attr('disabled', false);
            }
        });
    },
    highlight: function (element) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).removeClass('is-invalid');
    }
});




