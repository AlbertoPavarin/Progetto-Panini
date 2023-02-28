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

          fetch('https://localhost/Progetto-Panini/food-api/API/cart/setAddItem.php', requestOptions)
          .then((response) => {
            if (response.ok) {
                return response.json();
            }
            throw new Error(response.data);
          })
          .then((data) => {
            console.log(data);
            alert('Aggiunto al carrello');
        })
        .catch((e) => alert('Prodotto già nel carrello'));
    }
}