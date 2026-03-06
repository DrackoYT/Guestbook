document.querySelector("form") // Selecciona el formulari que volem

.addEventListener("submit", function(event) {

    event.preventDefault();

    let inputName = document.querySelector("#name_input");
    let inputMessage = document.querySelector("#message_text");

    let name = inputName.value.trim(); // El que fa trim() és llevar els espais finales de cada element
    let message = inputMessage.value.trim();
    if (name === "") {
        alert("ALERT. The name should be written!");
        return;
    }
    if (message === "") {
        alert("ALERT. The message should be written!");
        return;
    }

    if (message.length > 200) {
        alert("The message cannot exceed 200 characters!");
        return;
    }

    let data = new FormData(event.target);


    fetch("submit.php", {
        method: "POST",
        body: data
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (result) {
            if(result.trim() === "ok"){
                alert("Message saved!");
                let form = document.querySelector("form");
                form.reset();
            }
        });

})  // Això el que fa és escoltar quan l'usuari pren el botó de Submit i donar peu a l'event que hi ha dedins.




