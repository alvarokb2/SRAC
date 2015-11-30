// Empty JS for your own code to be here

$(document).ready(function () {
    $('#user_filter').on('input', function () {
        var text = $(this).val();
        var table = $('#user_table');
        var rows = table.find('tr');
        rows.each(function () {
            var row = $(this);
            var name = row.find('.user_name').text();
            if (text === '') {
                row.show();
            } else {
                var re = new RegExp(text, 'igm')
                if (!re.test(name)) {
                    row.hide();
                }
            }
        });
    });
});