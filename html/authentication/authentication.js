document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector('.authentication-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault()

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            var data = JSON.parse(this.responseText);
            if (data['error'] == null) {
                if (data['result'] == true) {
                    alert("Authentication Successful");
                    document.cookie = "authenticated=true;expires=0;path=/";
                    window.location.href = "../index.php";
                } else {
                    alert("Authentication Failed");
                }
            } else {
                alert(data['error']);
            }
        }
        xhttp.open("POST", "./authenticate.php", false);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(JSON.stringify({
            "functionname": 'authenticate',
            "arguments": document.querySelector('#auth_pass').value.toLowerCase()
        }));
    });
});