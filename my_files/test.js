$('#categoryexp-add-button').click(function () {
    $('#categoryexp-add').toggle('slow');
    $('#expense-categoryexp_add').val(null);
    $('#expense-categoryexp_add').focus();
    return false;
});