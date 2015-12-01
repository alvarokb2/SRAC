// Empty JS for your own code to be here

$(document).ready(function () {
    $('#user_filter_btn').createFilterTable('#user_filter_table');
    $('#reservas_filter_btn').createFilterTable('#table_reservas');
});

(function () {
    $.prototype.createFilterTable = function (tableId) {
        var table = $(tableId);
        var header = table.find('thead');
        var body = table.find('tbody');
        var titles = header.find('th');
        var content = $('<div/>', {
            class: 'jumbotron',
        });
        var textBox = $('<input/>', {
            class: 'form-control',
            type: 'text'
        });
        var handler = function () {
            var text = textBox.val();
            var labels = content.find('label');
            var rows = body.find('tr');
            rows.each(function () {
                var row = $(this);
                var datos = row.find('td');
                if (text === '') {
                    row.show();
                } else {
                    var re = new RegExp(text, 'igm')
                    var show = false;
                    var checked = false;
                    labels.each(function () {
                        var index = parseInt($(this).prop('index'));
                        var checkBox = $(this).find('input[type="checkbox"]');
                        if (checkBox.prop('checked')) {
                            checked = true;
                            show |= re.test(datos.get(index).innerText);
                        }
                    });
                    if (checked) {
                        if (show) {
                            row.show();
                        } else {
                            row.hide();
                        }
                    } else {
                        row.show();
                    }
                }
            });
        }
        titles.each(function (n) {
            var title = $(this);
            var checkBox = $('<input/>', {
                type: 'checkbox'
            });
            var labelCheckbox = $('<label/>', {
                class: 'checkbox-inline',
            }).append(checkBox).append(title.text()).prop('index', n);
            content.append(labelCheckbox);
            checkBox.on('change', handler);
        });
        textBox.on('input', handler);
        content.append(textBox);
        content.hide();
        $(this).after(content);
        $(this).click(function (e) {
            content.toggle();
        });
    };
})();