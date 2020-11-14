window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');

    setInterval(changeMessage, 5000);
    
    title.innerHTML= "RESPUESTA A TU SOLICITUD";
    body.style.overflow = "visible";
    container.style.display = "none";
    container.style.opacity = "0";
	
}