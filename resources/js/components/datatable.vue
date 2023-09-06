<script>
import $ from 'jquery';
import 'datatables.net';



$(document).ready(function() {
    $('#usertable').DataTable( {
        dom: 'Bfrtip',
        pagingType: 'full_numbers'
    } );
} );



$(document).ready(function() {
    $('.tabla-guias').DataTable( {
        dom: 'Bfrtip',
    } );
} );
</script>