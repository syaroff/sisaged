var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        let min = moment($('#min').val(), 'YYYY-MM-DD', true).isValid() ?
            moment($('#min').val(), 'YYYY-MM-DD', true).unix() :
            null;
        
         let max = moment($('#max').val(), 'YYYY-MM-DD').isValid() ?
             moment( $('#max').val(), 'YYYY-MM-DD', true ).unix():
             null;
        var date = moment( data[0].split(' ')[0], 'YYYY-MM-DD', true ).unix();
      

        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
  
  //Uncaught ReferenceError: table is not defined
  //table.rows( {search:'applied'} ).nodes();
  
  
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });

  
  var mytable = $('#dataLaporan').DataTable({
    
    footerCallback: function (row, data, start, end, display) {
            var api = this.api();
    
                // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                //return typeof i === 'string' ? typeof i === 'number' ? i : 0;
            };
    
    // Total over all pages
            total = api
                .column(1, {search:'applied'})
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
    
    $(api.column(1).footer()).html('Rp. ' + total + ' . Total Pendapatan');
        },
    
  initComplete: function () {
      $('.dt-buttons').removeClass('btn-group');
      },
  dom: 'rt',
  "ordering": false,
    });
    
    $('#dataLaporan').hide();
  
      // Refilter the table
    $('#min, #max').on('change', function () {
          if($('#min').val().length > 0 && $('#max').val().length > 0) {
      $('#dataLaporan').show();
        mytable.draw();
    }else{
    $('#dataLaporan').hide();
    } 
    });
  
});