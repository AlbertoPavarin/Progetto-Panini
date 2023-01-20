function addItem(id)
{
    document.querySelector(`#text-${id}`).innerHTML++;
}

function deleteItem(id)
{
    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML != 0)
    {
        text.innerHTML--;
    }
}