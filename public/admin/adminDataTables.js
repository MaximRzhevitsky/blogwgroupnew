jQuery(document).ready(function () {

    jQuery('#adminusers').DataTable({
        processing: true,
        serverSide: true,

        ajax: "getusers",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'birthday', name: 'birthday'},
            {data: 'gender', name: 'gender'},
            {data: 'country', name: 'country'},
            {data: 'city', name: 'city'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });


});
