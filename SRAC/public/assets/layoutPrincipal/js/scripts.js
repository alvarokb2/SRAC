// Empty JS for your own code to be here

$(document).ready(function () {
    $('#filter_btn').createFilterTable();
    $('.datetimepicker').datetimepicker({
        mask: '9999/19/39 29:00'
    });
});

(function () {
    $.prototype.createFilterTable = function () {
        var animationOptions = {
            contentToggle: function (e) {
                e.slideToggle(50);
            },
            rowHide: function (e) {
                e.fadeOut('fast');
            },
            rowShow: function (e) {
                e.fadeIn('fast');
            }
        };
        var filterBtn = $(this);
        var content = $(filterBtn.data('content'));
        var table = $(filterBtn.data('target'));
        var header = table.find('thead');
        var body = table.find('tbody');
        var titles = header.find('th');
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
            animationOptions.contentToggle(content);
            handler();
        });
        fg1.append(operador.append(oAnd).append(oOr));
        var handler = function () {
            var textBoxes = content.find('input[type="text"]');
            var totalVal = "";
            textBoxes.each(function () {
                totalVal += $(this).val()
            });
            var rows = body.find('tr');
            rows.each(function () {
                var row = $(this);
                var datos = row.find('td');
                var show = oAnd.hasClass('active');
                textBoxes.each(function () {
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
                    animationOptions.rowShow(row);
                } else {
                    animationOptions.rowHide(row);
                }
            });
        }
        titles.each(function (n) {
            var label = $('<label/>', {text: $(this).text(), class: 'control-label col-sm-2'});
            var div = $('<div/>', {class: 'col-sm-10'});
            var textBox = $('<input/>', {type: 'text', class: 'form-control input-sm'});
            var fg = $('<div/>', {class: 'form-group'});
            fg.append(label).append(div.append(textBox));
            textBox.prop('index', n);
            fg2.append(fg);
            textBox.on('input', handler);
        });
        content.append(fg1).append(fg2).append(fg3);
        content.hide(0);
        filterBtn.click(function (e) {
            animationOptions.contentToggle(content);
        });
    };
})();