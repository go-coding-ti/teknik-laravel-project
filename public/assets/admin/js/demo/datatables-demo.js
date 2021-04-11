// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable();

  // var table1 = $('#dataTableRev').DataTable({
  //   searchPanes: {
  //     threshold: 1,
  //     cascadePanes: true,
  //     clear: true
  //   },
  //   columnDefs: [
  //     { "width": "20%", "targets": 2, orderable: false, target: [0,1,2,3] }
  //   ],
  //   buttons: [
  //     'searchPanes'
  //   ],
  // });

  // table1.searchPanes.container().prependTo(table.table().container());
  // table1.searchPanes.resizePanes();
  // table1.searchPanes.container().hide();
  // $('#toggles').on('click',function () {

  //   table1.searchPanes.container().toggle();

  // });

  var table = $('#dataTables').DataTable({
    searchPanes: {
      threshold: 1,
      cascadePanes: true,
      clear: true
    },
    columnDefs: [
      { "width": "20%", "targets": 2, orderable: false, target: [0, 1, 2, 3] }
    ],
    buttons: [
      'searchPanes'
    ],
  });
  table.searchPanes.container().prependTo(table.table().container());
  table.searchPanes.resizePanes();
  table.searchPanes.container().hide();
  $('#toggle').on('click', function () {

    table.searchPanes.container().toggle();

  });

});
