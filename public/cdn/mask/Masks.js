// Máscaras
$(".date").mask("99/99/9999");
$(".date-time").mask("99/99/9999 99:99");
$(".zip-code").mask("99999-999");
$(".cnpj").mask("99.999.999/9999-99");
$('.cpf').mask('999.999.999-99');
$('.time').mask('99:99');
$(".phone").mask("+55 (99) 9999-9999");
$(".celullar").mask("+55 (99) 99999-9999");
$('.money').maskMoney({allowNegative: true, selectAllOnFocus: true, thousands:'', decimal:'.'});

$(".only-numbers").keypress(function (event) {

    let tecla = Number(event.which);

    if (tecla > 47 && tecla < 58) {
        return true;
    } else {
        return false;
    }

});