$(document).ready( function () {
    $('#table_id').DataTable({
    	pageLength: 5,
  		lengthMenu: [[5, 10, 20], [5, 10, 20]],
    });
} );