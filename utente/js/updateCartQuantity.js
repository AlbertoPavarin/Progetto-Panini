document.addEventListener('DOMContentLoaded', () => {
    const productContainer = document.querySelectorAll('.cart-prod-container');
    const quantityContainer = document.querySelectorAll(".quantity-container");
    productContainer.forEach((container) => {
        console.log(container.classList[3]);
        container.addEventListener('click', () => {
            //location.href = `product.php?product_id=${container.classList[3]}`;
        })
    })

    quantityContainer.forEach((container) => {
        container.addEventListener('click', () => {
            const containerChild = container.children[0];
            const minusBtn = containerChild.children[0];
            const plusBtn = containerChild.children[2];
            const text = containerChild.children[1];
            minusBtn.addEventListener('click', () => {
                console.log(text.innerHTML--);
            })
        })
    })

});