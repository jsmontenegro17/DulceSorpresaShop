window.onload = function () {
    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');    
    body.style.overflow = "visible";
    container.style.display = "none";
    container.style.opacity = "0";
    setInterval(changeMessage, 5000);
	
}