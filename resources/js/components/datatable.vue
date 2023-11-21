<script>
import $ from 'jquery';
import 'datatables.net';



$(document).ready(function() {
    $('#usertable').DataTable( {
        // dom: 'Bfrtip',
        pagingType: 'full_numbers',
        order: [0, 'desc'],
        stateSave: true,
        initComplete: function () {
        this.api()
            .columns([0, 1, 2, 3, 4, 5])
            .every(function () {
                let column = this;
                let title = column.footer().textContent;
 
                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    }

    } );
} );

$(document).ready(function() {
    $('.tabla-guias').DataTable( {
        order: [[0, 'asc']],
        // searching: false,
        stateSave: true,
        initComplete: function() {
            this.api()
                .columns([0, 1])
                .every(function() {
                var column = this;
                var title = column.footer().textContent;
 
                // Create input element
                var input = document.createElement('input');
                input.type = 'text';
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== input.value) {
                        column.search(input.value).draw();
                    }
                });
            });
        }
    } );
} );



$(document).ready(function() {
    $('#tabla-guias').DataTable({
        order: [[0, 'asc']],
        // searching: false,
        stateSave: true,
        initComplete: function() {
            this.api()
                .columns([0, 1, 5, 6])
                .every(function() {
                var column = this;
                var title = column.footer().textContent;
 
                // Create input element
                var input = document.createElement('input');
                input.type = 'text';
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== input.value) {
                        column.search(input.value).draw();
                    }
                });
            });
        }
    });
});

</script>