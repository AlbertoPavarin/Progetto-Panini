function setOrder(user_id, price, products)
{
    const breakValue = document.querySelector('#break-select').value;
    const pickupValue = document.querySelector('#pickup-select').value;
    
    let json = `{
        "user_ID":${user_id},
        "total_price":${price},
        "break_ID": ${breakValue},
        "status_ID": 1,
        "pickup_ID": ${pickupValue},
        "products": 
                ${JSON.stringify(products)}
            ,
        "json": {
        "user_ID": ${user_id},
        "total_price": ${price},
        "break_ID": ${breakValue},
        "status_ID": 1,
        "pickup_ID": ${pickupValue},
        "products": [
                {"name": "panino al prosciutto", "price": 3, "quantity":1},
                {"name": "panino al salame", "price": 3, "quantity":1},
                {"name": "panino proteico", "price": 3, "quantity":2}
            ]
        }
     }`;

     console.log(json);
}