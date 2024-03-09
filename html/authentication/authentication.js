import { setCookie } from "../hidden_words/hidden_words.js";

document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector('.authentication-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        if (document.querySelector('#auth_text').value == "Laptop") {
            setCookie("authenticated", "true", 0);
        }
        window.location.href = "../index.php";
    });
});