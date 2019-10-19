function incrementValue()
{
    var value = parseInt(document.getElementById('input-number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('input-number').value = value;
}

function decrementValue()
{
    var value = parseInt(document.getElementById('input-number').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1)
        value--;
    document.getElementById('input-number').value = value;
}