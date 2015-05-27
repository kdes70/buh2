$('#get-exchange').click(function () {
    $('#w0').showLoading();
    var zipId = 3; //Формирование параметра - var zipId = $(this).val();
    $.get('$url', {zipId: zipId}, function (data) {
        var currency_code = $('#exchange-currency_code').val();
        var data = $.parseJSON(data);
        $.each(data, function (idx, obj) {
            if (obj.ccy == currency_code)
                $('#exchange-official_exchange').attr('value', obj.buy);
        });
        $('#w0').hideLoading();
    });
});