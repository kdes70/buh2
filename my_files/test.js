$('#categoryexp-add-button').click(function () {

    //Изменяем значек на кнопке    
    if ($('#categoryexp-add').css('display') === 'block') {
        $("#categoryexp-add-button span").removeClass("glyphicon-minus");
        $("#categoryexp-add-button span").addClass("glyphicon-plus");
    } else {
        $("#categoryexp-add-button span").removeClass("glyphicon-plus");
        $("#categoryexp-add-button span").addClass("glyphicon-minus");
    }

    //Показываем поле    
    $('#categoryexp-add').toggle('slow');
    $('#expense-categoryexp_add').val(null);
    $('#expense-categoryexp_add').focus();

});