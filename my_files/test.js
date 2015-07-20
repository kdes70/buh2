$('#get-exchange').click(function () {
    if ($('#exchange-currency_code').val() == '') {
        alert('Необходимо заполнить «Код валюты» !');
        throw "";
    }
    $('#w0').showLoading();
    $.get('$url', {char3: $('#exchange-currency_code').val()}, function (data) {
        $('#exchange-number_units').val($.parseJSON(data).size[0]);
        $('#exchange-official_exchange').val($.parseJSON(data).rate[0]);
        $('#w0').hideLoading();
    });
});