<script>
import $ from 'jquery';
import 'datatables.net';



$(document).ready(function() {
    $('#usertable').DataTable( {
        dom: 'Bfrtip',
        pagingType: 'full_numbers',
        order: [0, 'desc'],
        stateSave: true
    } );
} );

$(document).ready(function() {
    $('.tabla-guias').DataTable( {
        dom: 'Bfrtip',
        order: [[0, 'asc']],
        stateSave: true
    } );
} );

$(document).ready(function() {
    $('#tabla-guias').DataTable( {
        dom: 'Bfrtip',
        order: [[0, 'asc']],
        stateSave: true
    } );
} );
</script>