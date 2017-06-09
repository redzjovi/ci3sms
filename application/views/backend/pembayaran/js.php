<script>
$(function () {
    var t = $('#table').DataTable({
        'columns': [
            { 'orderable': false },
            null,
            null,
            { 'orderable': false },
        ],
        'responsive': true,
        'search': {
            'smart': false,
        },
        'searching': false,
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#tanggal_pembayaran').datetimepicker({
        'format': 'DD/MM/YYYY',
        'useCurrent': true
    });
});
</script>
