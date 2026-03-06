let textarea = document.querySelector("#message_text");
let counter = document.querySelector("#character_count");

textarea.addEventListener("input", function() {
    let length = textarea.value.length;

    if (length > 200) {
        textarea.value = textarea.value.substring(0, 200);
        length = 200;
    }

    counter.textContent = length + "/200";
});

document.querySelector("form") // Selecciona el formulari que volem

.addEventListener("submit", function(event) {

    event.preventDefault();

    let form = document.querySelector("form");

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
                form.reset();
                counter.textContent = "0/200";
            }
        });



})  // Això el que fa és escoltar quan l'usuari pren el botó de Submit i donar peu a l'event que hi ha dedins.




