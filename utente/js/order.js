function setOrder(user_id, price)
{
    let json = `{
        "user_ID":${user_id}',
        "total_price":${price},
        "break_ID": ${document.querySelector('#break-select').value},
        "status_ID": 1,
        "pickup_ID": 1,
        "products": [
                {"ID": 1, "quantity": 1},
                {"ID": 2, "quantity": 1},
                {"ID": 3, "quantity": 2}
            ],
        "json": {
        "user_ID": 1,
        "total_price": 15.50,
        "break_ID": 1,
        "status_ID": 1,
        "pickup_ID": 1,
        "products": [
                {"name": "panino al prosciutto", "price": 3, "quantity":1},
                {"name": "panino al salame", "price": 3, "quantity":1},
                {"name": "panino proteico", "price": 3, "quantity":2}
            ]
        }
     }`;

     console.log(json);
}