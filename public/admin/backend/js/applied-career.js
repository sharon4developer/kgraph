$(document).ready(function () {

    loadDataTableForCareer();

    if(document.getElementById('career-details-table')){

        Sortable.create(document.getElementById('career-details-table').getElementsByTagName('tbody')[0], {
            onEnd: function (event) {
                // Get the new order of the rows
                var newOrder = [];
                $('#career-details-table tbody tr').each(function () {
                    newOrder.push(table.row(this).data());
                });

                // Pass the new order to the backend (e.g., using AJAX)
                $.ajax({
                    url: $('#route-for-user').val() + '/applied-career/update/order', // Replace with your Laravel route URL
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

// function loadDataTableForCareer() {
//     table = $('#career-details-table').DataTable({
//         processing: true,
//         serverSide: true,

//         ajax: {
//             url: $('#route-for-user').val() + '/applied-career/show',
//             dataType: "json",
//             type: "GET",
//             data: function (d) {
//                 d.from_date = $('#from_date').val();
//                 d.to_date = $('#to_date').val();
//             }
//         },
//         columns: [
//             { data: 'DT_RowIndex', orderable: false, searchable: false },
//             { data: 'career_id' },
//             { data: 'name' },
//             { data: 'email' },
//             { data: 'mobile' },
//             { data: 'branch' },
//             { data: 'department' },
//             {
//                 data: null,
//                 render: function (row) {
//                     if(row.message)
//                         return (`<div style="white-space:no-wrap">
//                                     <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Cover Letter" data-bs-placement="top"  href="` + row.message + `" download="` + row.message + `">
//                                         <i class="fa fa-download"></i>
//                                     </a>
//                                 </div>`);
//                     else
//                         return '';
//                 },
//                 orderable:
//                     false,
//                 searchable: false
//             },
//             {
//                 data: null,
//                 render: function (row) {
//                     if(row.resume)
//                         return (`<div style="white-space:no-wrap">
//                                 <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Resume" data-bs-placement="top"  href="` + row.resume + `" download="` + row.resume + `">
//                                     <i class="fa fa-download"></i>
//                                 </a>
//                             </div>`);
//                     else
//                         return '';
//                 },
//                 orderable:
//                     false,
//                 searchable: false
//             },
//             { data: 'created_at' },
//             // {
//             //     data: null,
//             //     render: function (row) {
//             //         return moment(row.created_at).format('DD MMM  YYYY hh:mm:a')
//             //     },
//             //     orderable:
//             //         false,
//             //     searchable: false
//             // },
//             {
//                 data: null,
//                 render: function (row) {
//                     return (`<div style="white-space:no-wrap">
//                                     <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"   data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Delete" data-bs-placement="top"   onclick="deleteData(`+ row.id + `)">
//                                          <i class="fa fa-trash"></i>
//                                     </a>
//                                  </div>`);

//                 }, orderable: false, searchable: false
//             },
//         ],
//         pagingType: "full_numbers",
//         "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
//             "<'table-responsive'tr>" +
//             "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
//         "oLanguage": {
//             "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
//             // "sInfo": "Showing page _PAGE_ of _PAGES_",
//             "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
//             "sSearchPlaceholder": "Search...",
//             "sLengthMenu": "Results :  _MENU_",
//         },
//         "stripeClasses": [],
//         lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
//     });
// }


function loadDataTableForCareer() {
    table = $('#career-details-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#route-for-user').val() + '/applied-career/show',
            dataType: "json",
            type: "GET",
            data: function (d) {
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'career_id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'branch' },
            { data: 'department' },
            {
                data: null,
                render: function (row) {
                    if (row.message)
                        return (`<div style="white-space:no-wrap">
                                    <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Cover Letter" data-bs-placement="top"  href="` + row.message + `" download="` + row.message + `">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>`);
                    else
                        return '';
                },
                orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    if (row.resume)
                        return (`<div style="white-space:no-wrap">
                                <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Resume" data-bs-placement="top"  href="` + row.resume + `" download="` + row.resume + `">
                                    <i class="fa fa-download"></i>
                                </a>
                            </div>`);
                    else
                        return '';
                },
                orderable: false, searchable: false
            },
            { data: 'created_at' },
            {
                data: null,
                render: function (row) {
                    let buttons = `<div style="white-space:no-wrap">`;

                    // Delete Button
                    if (row.can_delete) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Delete" data-bs-placement="top"
                                onclick="deleteData(${row.id})">
                                <i class="fa fa-trash"></i>
                            </a>`;
                    }

                    buttons += `</div>`;
                    return buttons;
                },
                orderable: false, searchable: false
            }
        ],
        pagingType: "full_numbers",
        dom: "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
        oLanguage: {
            oPaginate: { sPrevious: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', sNext: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            sSearch: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            sSearchPlaceholder: "Search...",
            sLengthMenu: "Results :  _MENU_",
        },
        stripeClasses: [],
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    });
}


function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure, do yo want to delete the career ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/applied-career/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Career deleted successfully");
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
