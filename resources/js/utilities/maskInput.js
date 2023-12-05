
var listMask = [];
$(function () {
    $("input").each(function (index) {
        var mask = "";
        var atributos = $(this)[0].attributes;

        $.each(atributos, function (index, value) {
            if (value.name == "mask") {

                mask = value.nodeValue;
            }
        });

        if (mask != "") {
            if (mask == "num") {

                var e = this;
                AddMaskNumber(e)
            } else {
                var input = { index, mask }
                listMask.push(input);
            }
        }
    });
    AddMaskInputs(listMask);
})

function AddMaskNumber(element) {
    var maskOptions =
    {
        mask: Number,
        //Cantidad de decimales
        scale: 2,
        //Permitir negativos
        signed: false,
        //Separador
        thousandsSeparator: ',',
        //Agregar decimales
        padFractionalZeros: true,
        normalizeZeros: true,
        //Si ingresa coma agregar punto
        radix: '.',
        mapToRadix: [','],
        //Minimo y maximo
        min: 0,
        max: 999999999
    };
    var mask = IMask(element, maskOptions);
    console.log('se añidio la mas')
}

function AddMaskInputs(list) {
    var listInput = $('input');
    for (let i = 0; i < list.length; i++) {
        var element = listInput[list[i].index];
        var maskOptions =
        {
            mask: list[i].mask
        };
        var mask = IMask(element, maskOptions);
    }

}

//var momentFormat = 'YYYY/MM/DD HH:mm';
//var momentMask = IMask(element, {
//    mask: Date,
//    pattern: momentFormat,
//    lazy: false,
//    min: new Date(1970, 0, 1),
//    max: new Date(2030, 0, 1),

//    format: function (date) {
//        return moment(date).format(momentFormat);
//    },
//    parse: function (str) {
//        return moment(str, momentFormat);
//    },

//    blocks: {
//        YYYY: {
//            mask: IMask.MaskedRange,
//            from: 1970,
//            to: 2030
//        },
//        MM: {
//            mask: IMask.MaskedRange,
//            from: 1,
//            to: 12
//        },
//        DD: {
//            mask: IMask.MaskedRange,
//            from: 1,
//            to: 31
//        },
//        HH: {
//            mask: IMask.MaskedRange,
//            from: 0,
//            to: 23
//        },
//        mm: {
//            mask: IMask.MaskedRange,
//            from: 0,
//            to: 59
//        }
//    }
//});