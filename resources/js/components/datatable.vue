<script>
import $ from 'jquery';
import 'datatables.net';



$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        pagingType: 'full_numbers'
    } );
} );
</script>