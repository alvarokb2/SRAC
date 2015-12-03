// Empty JS for your own code to be here

$(document).ready(function () {
    $('#filter_btn').createFilterTable('#filter_table');
});

(function () {
    $.prototype.createFilterTable = function (tableId) {
        var table = $(tableId);
        var header = table.find('thead');
        var body = table.find('tbody');
        var titles = header.find('th');
        var content = $('<div/>', {class: 'jumbotron form-horizontal'});
        var fg1 = $('<div/>', {class: 'form-group'});
        var fg2 = fg1.clone();
        var fg3 = fg1.clone();
        var clearBtn = $('<div/>', {text: 'Borrar Filtro', class: 'btn btn-primary'});
        fg3.append(clearBtn);
        var operador = $('<div/>', {class: 'btn-group btn-block'});
        var oAnd = $('<div/>', {text: 'And', class: 'btn btn-primary active'});
        var oOr = $('<div/>', {text: 'Or', class: 'btn btn-primary'});
        oAnd.click(function () {
            oAnd.addClass('active');
            oOr.removeClass('active');
            handler();
        });
        oOr.click(function () {
            oOr.addClass('active');
            oAnd.removeClass('active');
            handler();
        });
        clearBtn.click(function () {
            var textBoxes = content.find('input[type="text"]');
            textBoxes.val('');
            content.hide();
            handler();
        });
        fg1.append(operador.append(oAnd).append(oOr));
        var handler = function () {
            var textboxes = content.find('input[type="text"]');
            var totalVal = "";
            textboxes.each(function () {
                totalVal += $(this).val()
            });
            var rows = body.find('tr');
            rows.each(function () {
                var row = $(this);
                var datos = row.find('td');
                var show = oAnd.hasClass('active');
                textboxes.each(function () {
                    var text = $(this).val();
                    var index = parseInt($(this).prop('index'));
                    var dato = datos.get(index).innerText;
                    var re = new RegExp(text, 'igm');
                    if (oAnd.hasClass('active')) {
                        if (!re.test(dato) && text !== "") {
                            show &= false;
                        }
                    } else {
                        if ((re.test(dato) && text !== "") || totalVal === "") {
                            show |= true;
                        }
                    }
                });
                if (show) {
                    row.show();
                } else {
                    row.hide();
                }
            });
        }
        titles.each(function (n) {
            var label = $('<label/>', {text: $(this).text(), class: 'control-label col-sm-2'});
            var div = $('<div/>', {class: 'col-sm-10'});
            var textbox = $('<input/>', {type: 'text', class: 'form-control'});
            var fg = $('<div/>', {class: 'form-group'});
            fg.append(label).append(div.append(textbox));
            textbox.prop('index', n);
            fg2.append(fg);
            textbox.on('input', handler);
        });
        content.append(fg1).append(fg2).append(fg3);
        content.hide();
        $(this).after(content).click(function (e) {
            content.toggle();
        });
    };
})();