$('.search-button').click(function () {
    $('.search-form').toggle('slow');
    return false;
});
$('.search-form form').submit(function () {
    $.fn.yiiGridView.update('expense-grid', {
        data: $(this).serialize()
    });
    return false;
});