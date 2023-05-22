document.getElementsByClassName("scopri-il-menu").array.forEach(button => {
    if(button instanceof HTMLButtonElement) {
        button.onclick = function () {
            /**
             * bind location.href with button.id for providing GET params
             */
            location.href
            button.id
        }
    }
});