function setOrder(user_id, price, products, productOnJson, breakValue, pickupValue)
{
    let json = `{
        "user":"${user_id}",
        "total_price":"${price}",
        "break": "${breakValue}",
        "status": "1",
        "pickup": "${pickupValue}",
        "products": 
                ${JSON.stringify(products)}
            ,
        "json": {
        "user": "${user_id}",
        "total_price": "${price}",
        "break": "${breakValue}",
        "status": "1",
        "pickup": "${pickupValue}",
        "products": ${JSON.stringify(productOnJson)}
        }
     }`;

     const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(JSON.parse(json)),
      };

      fetch('https://localhost/Progetto-Panini/food-api/API/order/setOrder.php', requestOptions)
      .then((response) => {
        if (response.ok) {
            return response.json();
        }
        throw new Error(response.data);
      })
      .then((data) => {
        console.log(data);
        alert('ordinato');
        location.href = "index.php";
      })
      .catch((e) => {document.querySelector('#error').innerHTML = "Seleziona punto di ritiro e/o ricreazione"})
}