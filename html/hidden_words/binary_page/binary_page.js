import { getCookie } from "../hidden_words.js";

document.addEventListener('DOMContentLoaded', (event) => {
    let binary = '';
    if (getCookie("authenticated") == "true") {
        const word = "dispatched";
        for (let i = 0; i < word.length; i++) {
            binary += word[i].charCodeAt(0).toString(2) + ' ';
        }
        document.getElementById('binaryOutput').innerText = "";
        document.getElementById('binaryOutput').appendChild(document.createRange().createContextualFragment(
            `<strong>Police investigation</strong><br><br>
            A police officer was ${binary} to the site to investigate the situation and arrest the farmer 
            for his involvement in illegal animal slaughter. Reports have it that the police officer had 
            reached the farmer’s barn but the farmer was nowhere to be seen. The police officer inquired 
            about the whereabouts of the farmer but no one had any leads. After tirelessly looking for the 
            farmer throughout the day, the police officer reports his progress to the police department. 
            The department tells the officer to retreat and continue his search on the following day. 
            <br><br>
            That was the last anyone heard from the police officer. His last known location was close 
            to the barn but the officer never returned. The following day the department sent backup to 
            arrest the farmer and find the missing police officer. The officer’s car was found but the 
            whereabouts of the officer are still unknown. Meanwhile, the farmer was found and arrested and 
            is currently under further questioning.
            `
        ));
    } else {
        // const wordContainer = document.getElementById('wordContainer');
        // const word = wordContainer.getAttribute('data-word')
        // convert word to binary
        
        setBinaryWord();
    }
});

function setBinaryWord() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            var word = data['result'];
            let binary = '';
            for (let i = 0; i < word.length; i++) {
                binary += word[i].charCodeAt(0).toString(2) + ' ';
            }

            document.getElementById('binaryOutput').innerText = binary.trim();
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../../authentication/authenticate.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'decrypt',
        "word": getCookie('binary')
    }));
}