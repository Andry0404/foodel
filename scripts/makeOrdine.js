const buttons = document.getElementsByClassName("subscribe-button effettuaOrdineButton")

for (let index = 0; index < buttons.length; index++) {
    const button = buttons[index];

    button.onclick = function () {
        // const id_ristorante = button.id;
        location.href = `./index.php`;
        return true;
    }
}
