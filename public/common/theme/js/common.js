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
        },
        country: {
            required: true,
        },
        mobile: {
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
            url: $('#base-route').val() + '/submit-contact-form',
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
                    $('#contact-add-form').trigger('reset');
                    modal = document.getElementById('modalpopup');
                    if(modal)
                        modal.classList.add('!hidden');
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

$('#career-add-form').validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
        },
        country: {
            required: true,
        },
        mobile: {
            required: true,
        },
        branch: {
            required: true,
        },
        department: {
            required: true,
        },
        message: {
            required: true,
        },
        resume: {
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
            url: $('#base-route').val() + '/submit-career-form',
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
                    $('#career-add-form').trigger('reset');
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

$('#eligibility-form').validate({
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        street_address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        zip: {
            required: true,
        },
        country_live: {
            required: true,
        },
        country_born: {
            required: true,
        },
        mobile: {
            required: true,
            digits: true,
        },
        dob: {
            required: true,
            date: true,
        },
        marital_status: {
            required: true,
        },
        have_children: {
            required: true,
        },
        hear_about_canada: {
            required: true,
        },
        type_of_application: {
            required: true,
        },
        further_info: {
            required: true,
        },
        funds_available: {
            required: true,
        },
        highest_education_outside_can: {
            required: true,
        },
        country_of_studies: {
            required: true,
        },
        highest_education_inside_can: {
            required: true,
        },
        language_level_english: {
            required: true,
        },
        english_language_test: {
            required: true,
        },
        language_level_french: {
            required: true,
        },
        french_language_test: {
            required: true,
        },
        resume: {
            required: true,
        },
        main_industry: {
            required: true,
        },
        work_exp_outside_can: {
            required: true,
        },
        work_exp_inside_can: {
            required: true,
        },
        entitled_to_work: {
            required: true,
        },
        manage_business: {
            required: true,
        },
        temporary_foreign_worker: {
            required: true,
        },
        certificate_of_qualification: {
            required: true,
        },
        job_offer: {
            required: true,
        },
        family_relations_in_canada: {
            required: true,
        },
        refused_or_cancelled_visa: {
            required: true,
        },
        refused_admission: {
            required: true,
        },
        partner_been_to_canada: {
            required: true,
        },
        overstayed_in_any_country: {
            required: true,
        },
        partner_previously_applied_for_visa: {
            required: true,
        },
        partner_previously_submitted_an_application: {
            required: true,
        },
        criminal_record: {
            required: true,
        },
        arrested: {
            required: true,
        },
        detained: {
            required: true,
        },
        nomination_certificate: {
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
            url: $('#base-route').val() + '/submit-eligibility-form',
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
                    $('#eligibility-form').trigger('reset');
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
