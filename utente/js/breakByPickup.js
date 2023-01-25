function getBreakByPickup(selected)
{
    const options = document.querySelectorAll('.option-break');
    options.forEach((option) => option.remove())
    fetch(`http://localhost:8080/Progetto-Panini/food-api/API/order/pickup/getPickupIdBreak.php?PICKUP_ID=${selected.value}`)
    .then((response) => response.json())
    .then((data) => {
        data.forEach(bbreak => {
            fetch(`http://localhost:8080/Progetto-Panini/food-api/API/order/break/getBreak.php?BREAK_ID=${bbreak['break']}`)
            .then((response => response.json()))
            .then(data => {
                const element = document.createElement("option");
                element.className = "option-break";
                element.text = `${data[0]['time']}`;
                element.value = bbreak['break'];
                document.querySelector('#break-select').appendChild(element);
            })
        });
    });
}