function incrementValue(nb)
{
    qty = document.getElementsByClassName('input-number')[nb];
    var value = parseInt(qty.value);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementsByClassName('input-number')[nb].value = value;
}

function decrementValue(nb)
{
    qty = document.getElementsByClassName('input-number')[nb];
    var value = parseInt(qty.value);
    value = isNaN(value) ? 0 : value;
    if (value > 1)
        value--;
    document.getElementsByClassName('input-number')[nb].value = value;
}