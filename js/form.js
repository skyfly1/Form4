$(function () {
    $("#phone1").mask("+375 (99) 99-99-999");

    $('#width, #sections, #height').on('change', function () {
        var width = +($('#width option:selected').text());
        var method = +($('#sections option:selected').text());
        var height = +($('#height option:selected').text());
        var result = width + height + method;
        $('#result').val(result + ' руб.');
    });

    $('#but').on('click', function () {
        $(this).hide();
        $('#form').css('display', 'flex')
    });
});
