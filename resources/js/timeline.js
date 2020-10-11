var i = document.getElementById("datatype_count")
        ? parseInt(document.getElementById("datatype_count").value)
        : 0;

function increment() {
    i += 1;
}

function addElement() {
    var tr = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');

    var selectElement = document.getElementById("timeline_datatype_0").cloneNode(true);

    var inputElement = document.createElement("input");
    inputElement.setAttribute("type", "text");
    inputElement.setAttribute("class", "form-control")

    increment();
    inputElement.setAttribute("Name", "timeline_datapoint_" + i);
    inputElement.setAttribute("id", "timeline_datapoint_" + i);
    selectElement.setAttribute("Name", "timeline_datatype_" + i);
    selectElement.setAttribute("id", "timeline_datatype_" + i);

    td1.appendChild(selectElement);
    td2.appendChild(inputElement);

    tr.appendChild(td1);
    tr.appendChild(td2);
    $("#datatype_table tr:last").prev().after(tr);
}

$(function () {
    $('#add_another_data_point').on('click', (e) => {
        e.preventDefault();
        addElement();
    });
})
