
<script>
$(function () {
    $('#tanggal_pembelian, #tanggal_jatuh_tempo').datetimepicker({
        'format': 'DD/MM/YYYY',
        'useCurrent': true
    });

    $('#id_pelanggan').select2({
        'allowClear': true,
        'placeholder': '<?= '- '.sprintf(lang('select_with_param'), lang('customer')).' - '; ?>'
    });

    $('#id_barang').select2({
        'allowClear': true,
        'placeholder': '<?= '- '.sprintf(lang('select_with_param'), lang('goods')).' - '; ?>'
    }).on('select2:select', function (e) {
        $.ajax({
            'data': {id: $(this).val()},
            'url': '<?= site_url('backend/barang/find_by_pk'); ?>',
            'success': function(data) {
                data = JSON.parse(data);
                $('#harga').val(data.harga);
                $('#total').val( data.harga * $('#kuantitas').val() );
            }
        });
    });

    $("#kuantitas").on('change keyup', function () {
        $('#total').val( $('#harga').val() * $(this).val() );
    });
});
</script>
