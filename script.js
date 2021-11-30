var h_message = document.getElementById("history")
var enviarMessage = document.getElementById("enviar")
const url = "http://localhost/apoio/api/"

function addMessage(message){
    history.innerText = message;
}



var form = document.getElementById("form");
function handleForm(event) { event.preventDefault(); } 
form.addEventListener('submit', handleForm);


enviarMessage.onclick = ()=>{
    var nick = document.querySelectorAll('input')[0].value
    var message = document.querySelectorAll('input')[1].value
    var data = { nick: nick, message: message };
    fetch(url, {
        method: "POST",
        
        body: JSON.stringify(data),
    })
    .then((response)=>{
        return response.json()
    })
    .then((result)=>{
        console.log(result);
        let p = document.createElement("p")
        p.innerText = Date(result['timestemp']).slice(16,25)+" : "+message
        h_message.appendChild(p)
    })  
}