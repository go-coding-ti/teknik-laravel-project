// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();

  var table = $('#dataTables').DataTable({
    searchPanes: {
      threshold: 1,
      cascadePanes: true,
      clear: true
    },
    "columnDefs": [
      { "width": "20%", "targets": 2 }
    ],
    buttons: [
      'searchPanes'
    ],
  });
  table.searchPanes.container().prependTo(table.table().container());
  table.searchPanes.resizePanes();
  table.searchPanes.container().hide();
  $('#toggle').on('click',function () {

    table.searchPanes.container().toggle();

  });
  
});
