$('#unit-edit-button').click(function () {
    //Изменяем значек на кнопке    
    if ($('#unit-edit').css('display') === 'block') {
        $("#unit-edit-button span").removeClass("glyphicon-minus");
        $("#unit-edit-button span").addClass("glyphicon-plus");
    } else {
        $("#unit-edit-button span").removeClass("glyphicon-plus");
        $("#unit-edit-button span").addClass("glyphicon-minus");
    }
    //Показываем поле    
    $('#unit-edit').slideToggle(150);
    $('#expense-count_unit').focus();

});
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
    $('#categoryexp-add').slideToggle(150);
    $('#expense-categoryexp_add').val(null);
    $('#expense-categoryexp_add').focus();
});