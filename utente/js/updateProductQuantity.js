function addItem(id)
{
    document.querySelector(`#text-${id}`).innerHTML++;
}

function deleteItem(id)
{
    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML > 1)
    {
        text.innerHTML--;
    }
}

function addToCart(id, user_id)
{
    let prodQuantity = document.querySelector(`#text-${id}`).innerHTML;
    console.log(prodQuantity);
    if (prodQuantity > 0)
    {
        const requestOptions = {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              user: user_id,
              product: id,
              quantity: prodQuantity,
            }),
          };

          fetch('http://localhost:8080/Progetto-Panini/food-api/API/cart/setAddItem.php', requestOptions)
          .then((response) => response.json())
          .then((data) => console.log(data));
    }
}