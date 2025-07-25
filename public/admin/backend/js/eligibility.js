$(document).ready(function () {

    loadDataTableForEligibility();

    if(document.getElementById('eligibility-details-table')){

        Sortable.create(document.getElementById('eligibility-details-table').getElementsByTagName('tbody')[0], {
            onEnd: function (event) {
                // Get the new order of the rows
                var newOrder = [];
                $('#eligibility-details-table tbody tr').each(function () {
                    newOrder.push(table.row(this).data());
                });

                // Pass the new order to the backend (e.g., using AJAX)
                $.ajax({
                    url: $('#route-for-user').val() + '/eligibility-check/update/order', // Replace with your Laravel route URL
                    method: 'POST',
                    data: {
                        order: newOrder
                    },
                    success: function (response) {
                        table.ajax.reload(null, false);
                    },
                    error: function (xhr) {
                        // Handle error response
                    }
                });
            }
        });
    }
});

function loadDataTableForEligibility() {
    table = $('#eligibility-details-table').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: $('#route-for-user').val() + '/eligibility-check/show',
            dataType: "json",
            type: "GET",
            data: function (d) {
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            {
                data: null,
                render: function (row) {
                    return `<a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" href="#"  onclick="loadData(` + row.id + `)" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Seo" data-bs-placement="top">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>`;

                }, orderable: false, searchable: false
            },
            {
                data:'created_at',
            },
            // {
            //     data: null,
            //     render: function (row) {
            //         return moment(row.created_at).format('DD MMM  YYYY hh:mm:a')
            //     },
            //     orderable:
            //         false,
            //     searchable: false
            // },
            {
                data: null,
                render: function (row) {
                    return (`<div style="white-space:no-wrap">
                                    <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"   data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Delete" data-bs-placement="top"   onclick="deleteData(`+ row.id + `)">
                                         <i class="fa fa-trash"></i>
                                    </a>
                                 </div>`);

                }, orderable: false, searchable: false
            },
        ],
        pagingType: "full_numbers",
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            // "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    });
}

function loadData(id) {
    $('.popover-header').hide();
    $('.popover-arrow').hide();
    $.ajax({
        url: $("#route-for-user").val() + `/eligibility-check/` + id + `/edit`,
        type: 'GET',
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (data) {
        showData(data);
    }).fail(function () {
        console.log('Error');
    }).always(function () { });
}

function showData(data) {

    const headers = {
        first_name: "First Name",
        last_name: "Last Name",
        email: "Email",
        street_address: "Address",
        city: "Citizenship",
        state: "Canadian Experience",
        zip: "Foreign Experience",
        // country_live: "Country where you currently live",
        // country_born: "Country where you were born",
        mobile: "Mobile Number",
        dob: "Date of Birth",
        marital_status: "Marital Status",
        // have_children: "Do you have children?",
        hear_about_canada: "How Did you Hear about Us",
        // type_of_application: "Type of application you are looking for",
        // further_info: "Further Information",
        // funds_available: "Funds available to invest in your plan to immigrate to Canada",
        // highest_education_outside_can: "Highest Level of Education - Outside Canada",
        country_of_studies: "Do you have a valid Language Skills Test Result",
        highest_education_inside_can: "Highest Level of Education",
        // language_level_english: "Language Level - English",
        // english_language_test: "Have you taken an English language test (IELTS, CELPIP, PTE, or Duolingo)? ",
        // language_level_french: "Language Level - French",
        // french_language_test: "Have you taken a French language test (TEF, TEF Canada, or TCF Canada)?",
        // resume: "Resume",
        // main_industry: "Main Occupation Industry",
        // work_exp_outside_can: "Outside Canada - Work Experience",
        // work_exp_inside_can: "Inside Canada - Work Experience",
        // entitled_to_work: "Are you legally entitled to work in that country?",
        // manage_business: "Do you own/manage a business?",
        // temporary_foreign_worker: "Have you been in Canada as a temporary foreign worker?",
        certificate_of_qualification: "Have you held a Canadian Education",
        // job_offer: "Do you have a job offer from a Canadian employer?",
        family_relations_in_canada: `Do you or your spouse or common-law partner have a blood relative living in
                                Canada who is a citizen or a permanent resident of Canada`,
        refused_or_cancelled_visa: `Any Previous Visa Refusal`,
        // refused_admission: `Have you been REFUSED admission to, ORDERED to leave, or DEPORTED from Canada, USA, or any other country? This includes a border officer taking away your visa?`,
        // partner_been_to_canada: "Have you or your spouse/partner been to Canada?",
        // overstayed_in_any_country: "Have you overstayed in any country you were living or visiting (stayed with an expired visa or permit)?",
        // partner_previously_applied_for_visa: "Have you or your spouse/partner previously applied for a visa/permit to Canada?",
        // partner_previously_submitted_an_application: "Have you or your spouse/partner previously submitted an application for Canadian permanent residency?",
        criminal_record: "Do you have any criminal record(s) in your home country or any other country",
        // arrested: "Have you ever committed, been arrested for or been charged with or convicted of any CRIMINAL OFFENCE in any country or territory?",
        detained: "Any Additional Information?",
        language_test: "Which language test did you take?",
        speaking: "Speaking",
        reading: "Reading",
        listening: "Listening",
        writing: "Writing",
        // nomination_certificate: "Do you have a nomination certificate from a Canadian Province (except Quebec)?"
    };

    let htmlContent = '<table class="table table-bordered">';

    const isCountryOfStudiesYes = data.data.country_of_studies === 'Yes';

    Object.entries(data.data).forEach(([key, value]) => {
        if (headers[key]) { // Only include keys present in headers
            let displayValue;

            if (key === 'resume' && value) {
                // Create download link for resume
                displayValue = `
                    <div style="white-space: nowrap;">
                        <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                           data-bs-toggle="popover" data-bs-trigger="hover"
                           data-bs-original-title="Resume" data-bs-placement="top"
                           href="${value}" download="${value}">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                `;
            } else {
                // Set display value based on conditions
                displayValue = value === 'on' ? 'Yes' : (value ? value : 'N/A');
            }

            if (key === 'language_test' || key === 'speaking' || key === 'reading' || key === 'listening' || key === 'writing') {
                if (isCountryOfStudiesYes) {
                    // If country_of_studies is "Yes", show language fields
                    htmlContent += `
                        <tr>
                            <th style="width: 50%;font-size: 14px;font-weight: 900;vertical-align: middle;">${headers[key]}</th>
                            <td>${displayValue}</td>
                        </tr>
                    `;
                }
            } else {

                htmlContent += `
                    <tr>
                        <th style="width: 50%;font-size: 14px;font-weight: 900;vertical-align: middle;">${headers[key]}</th>
                        <td>${displayValue}</td>
                    </tr>
                `;
            }
        }
    });

    htmlContent += '</table>';

    $('#eligibility-modal .box-body').html(htmlContent);


    $('#eligibility-modal').modal('show');
}

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure, do yo want to delete the eligibility ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/eligibility-check/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Eligibility deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}
$('#from_date').on('change',function (e) {

    table.ajax.reload();
})
$('#to_date').on('change',function (e) {

    table.ajax.reload();
})
