const buttons = document.getElementsByClassName("subscribe-button lascia-recensione")

for (let index = 0; index < buttons.length; index++) {
    const button = buttons[index];

    button.onclick = function () {
        const id_ristorante = button.id;
        location.href = `./crea-recensione.php?ristid=${id_ristorante}`;
        return true;
    }
}
