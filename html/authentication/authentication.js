document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector('.authentication-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        if (document.querySelector('#auth_pass').value.toLowerCase() == "cash cow") {
            document.cookie = "authenticated=true;expires=0;path=/";
            alert("Authentication Successfull");
            window.location.href = "../index.php";
        } else {
                alert("Authentication Failed");
        }
    });
});