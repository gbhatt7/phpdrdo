//used for searching in the table

$("#search").on("keyup", function () {
    var input, filter, table, tr, td;
    input = $("#search");
    filter = input.val().toUpperCase();
    table = $("#table");
    tr = table.find("tr");

    tr.each(function () {
        var linha = $(this);
        $(this).find('td').each(function () {
            td = $(this);
            if (td.html().toUpperCase().indexOf(filter) > -1) {
                linha.show();
                return false;
            } else {
                linha.hide();
            }
        })
    })
})