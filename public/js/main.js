function inputInteger(input) {
    $(input).on('keypress', (evt) => {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /^[0-9]+$/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }

        if (evt.target.value.length >= (evt.target.maxLength >= 0 ? evt.target.maxLength : 11)) {
            theEvent.preventDefault();
        }
    });

    $(input).bind('paste', function (e) {
        e.preventDefault();
    });
}

$(document).ready(function () {
    $('.input-license-plate').mask('AAA-AAAA');

    $('.input-renavam').mask('999999999999999');
    $('.input-year').mask('0000')
    $('.input-cpf').mask('000.000.000-00', { reverse: true });

    inputInteger('.input-integer');

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.input-phone').mask(SPMaskBehavior, spOptions);

    $('.select2').select2({
        theme: "bootstrap-5",
    });
});