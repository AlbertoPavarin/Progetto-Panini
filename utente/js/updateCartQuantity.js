function addItem(id, user_id)
{
    const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          user: user_id,
          product: id,
        }),
      };

    fetch('http://localhost:8080/Progetto-Panini/food-api/API/cart/setAdd.php', requestOptions)
    .then((resposne) => resposne.json())
    .then((data) => console.log(data));

    document.querySelector(`#text-${id}`).innerHTML++;
}

function deleteItem(id, user_id)
{
    const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          user: user_id,
          prod: id,
        }),
      };

    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML != 0)
    {
        fetch('http://localhost:8080/Progetto-Panini/food-api/API/cart/setRemove.php', requestOptions)
        .then((response) => response.json())
        .then((data) => console.log(data));

        text.innerHTML--;
    }
}