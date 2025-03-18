// Data Table
let table = new DataTable('#myTable', {
    "paging": false,
    "info": false,
    "order": [],
    "columnDefs": [
        { "orderable": false, "targets": -1 } 
    ],
    language: {
        search: translations.search
    }
});



