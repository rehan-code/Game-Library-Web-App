document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector('.authentication-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        window.location.href = "../index.php";
    });

});