$(document).ready(function() {
  $('#example1').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy',
      'csv',
      'excel',
      'pdf',
      'print'
    ],
    "dom": "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" + 
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
  });
});