function changeMessage() {
	var message = document.getElementById('message-loading');
	message.dataset.message;

	if(message.dataset.message == "Listo..."){
		message.dataset.message = "Cargando tu peticion...";
		document.getElementById('message-loading').innerHTML = "Cargando tu peticion...";
	}else if(message.dataset.message == "Bienvenid@..." || message.dataset.message == "Cargando tu peticion..." || message.dataset.message == "Nuestro servidor esta muy saturado..."){
		message.dataset.message = "Esperamos que tengas una linda experiencia...";
		document.getElementById('message-loading').innerHTML = "Esperamos que tengas una linda experiencia...";
	}else if(message.dataset.message == "Esperamos que tengas una linda experiencia..."){
		message.dataset.message = "Ten paciencia, nuestra pagina esta cargando tu peticion...";
		document.getElementById('message-loading').innerHTML = "Ten paciencia, nuestra pagina esta cargando tu peticion...";
	}else if(message.dataset.message == "Ten paciencia, nuestra pagina esta cargando tu peticion..."){
		message.dataset.message = "Si tienes alguna sugerencia no dudes en darla...";
		document.getElementById('message-loading').innerHTML = "Si tienes alguna sugerencia no dudes en darla...";
	}else if(message.dataset.message == "Si tienes alguna sugerencia no dudes en darla..."){
		message.dataset.message = "Estamos para mejorar...";
		document.getElementById('message-loading').innerHTML = "Estamos para mejorar...";
	}else if(message.dataset.message == "Estamos para mejorar..."){
		message.dataset.message = "Ten paciencia...";
		document.getElementById('message-loading').innerHTML = "Ten paciencia...";
	}else if(message.dataset.message == "Ten paciencia..."){
		message.dataset.message = "Organizando nueva informacion para mostrar.";
		document.getElementById('message-loading').innerHTML = "Organizando nueva informacion para mostrar.";
	}else if(message.dataset.message == "Organizando nueva informacion para mostrar."){
		message.dataset.message = "Organizando nueva informacion para mostrar..";
		document.getElementById('message-loading').innerHTML = "Organizando nueva informacion para mostrar..";
	}else if(message.dataset.message == "Organizando nueva informacion para mostrar.."){
		message.dataset.message = "Organizando nueva informacion para mostrar...";
		document.getElementById('message-loading').innerHTML = "Organizando nueva informacion para mostrar...";
	}else if(message.dataset.message == "Organizando nueva informacion para mostrar..."){
		message.dataset.message = "Nuestro servidor puede estar saturado...";
		document.getElementById('message-loading').innerHTML = "Nuestro servidor puede estar saturado...";
	}else if (message.dataset.message == "Agregando al carrito.") {
		message.dataset.message = "Agregando al carrito..";
		document.getElementById('message-loading').innerHTML = "Agregando al carrito..";
	}else if(message.dataset.message == "Agregando al carrito..") {
		message.dataset.message = "Agregando al carrito...";
		document.getElementById('message-loading').innerHTML = "Agregando al carrito...";
	}else if(message.dataset.message == "Eliminando combo del carrito.") {
		message.dataset.message = "Eliminando combo del carrito..";
		document.getElementById('message-loading').innerHTML = "Eliminando combo del carrito..";
	}else if(message.dataset.message == "Eliminando del carrito..") {
		message.dataset.message = "Eliminando del carrito...";
		document.getElementById('message-loading').innerHTML = "Eliminando combo del carrito...";
	}else if(message.dataset.message == "Eliminando del carrito...") {
		message.dataset.message = "Configurando precio total...";
		document.getElementById('message-loading').innerHTML = "Configurando precio total...";
	}else if(message.dataset.message == "Cambiando cantidad.") {
		message.dataset.message = "Cambiando cantidad..";
		document.getElementById('message-loading').innerHTML = "Cambiando cantidad..";
	}else if(message.dataset.message == "Cambiando cantidad..") {
		message.dataset.message = "Cambiando cantidad...";
		document.getElementById('message-loading').innerHTML = "Cambiando cantidad...";
	}else if(message.dataset.message == "Cambiando cantidad...") {
		message.dataset.message = "Configurando precio del combo...";
		document.getElementById('message-loading').innerHTML = "Configurando precio del combo...";
	}else if(message.dataset.message == "Configurando precio del combo...") {
		message.dataset.message = "Configurando precio total...";
		document.getElementById('message-loading').innerHTML = "Configurando precio total...";
	}else if(message.dataset.message == "Preparando la pagina para que hagas tu orden.") {
		message.dataset.message = "Preparando la pagina para que hagas tu orden..";
		document.getElementById('message-loading').innerHTML = "Preparando la pagina para que hagas tu orden..";
	}else if(message.dataset.message == "Preparando la pagina para que hagas tu orden..") {
		message.dataset.message = "Preparando la pagina para que hagas tu orden...";
		document.getElementById('message-loading').innerHTML = "Preparando la pagina para que hagas tu orden...";
	}else if(message.dataset.message == "Preparando la pagina para que hagas tu orden...") {
		message.dataset.message = "Esto puede tardar unos segundos...";
		document.getElementById('message-loading').innerHTML = "Esto puede tardar unos segundos...";
	}else if(message.dataset.message == "Esto puede tardar unos segundos...") {
		message.dataset.message = "Cargando productos de tus combos..";
		document.getElementById('message-loading').innerHTML = "Cargando productos de tus combos..";
	}else if(message.dataset.message == "Cargando productos de tus combos..") {
		message.dataset.message = "Cargando productos de tus combos...";
		document.getElementById('message-loading').innerHTML = "Cargando productos de tus combos...";
	}else if(message.dataset.message == "Cargando productos de tus combos...") {
		message.dataset.message = "Cargando productos editables de tus combos..";
		document.getElementById('message-loading').innerHTML = "Cargando productos editables de tus combos..";
	}else if(message.dataset.message == "Cargando productos editables de tus combos..") {
		message.dataset.message = "Cargando productos editables de tus combos...";
		document.getElementById('message-loading').innerHTML = "Cargando productos editables de tus combos...";
	}else if(message.dataset.message == "Cargando productos editables de tus combos...") {
		message.dataset.message = "Cargando productos modificables de tus combos..";
		document.getElementById('message-loading').innerHTML = "Cargando productos modificables de tus combos..";
	}else if(message.dataset.message == "Cargando productos modificables de tus combos..") {
		message.dataset.message = "Cargando productos modificables de tus combos...";
		document.getElementById('message-loading').innerHTML = "Cargando productos modificables de tus combos...";
	}else if(message.dataset.message == "Cargando productos modificables de tus combos...") {
		message.dataset.message = "Cargando imagenes de los productos y de tus combos..";
		document.getElementById('message-loading').innerHTML = "Cargando imagenes de los productos y de tus combos..";
	}else if(message.dataset.message == "Cargando imagenes de los productos y de tus combos..") {
		message.dataset.message = "Cargando imagenes de los productos y de tus combos...";
		document.getElementById('message-loading').innerHTML = "Cargando imagenes de los productos y de tus combos...";
	}else if(message.dataset.message == "Cargando imagenes de los productos y de tus combos...") {
		message.dataset.message = "Estara listo en breve...";
		document.getElementById('message-loading').innerHTML = "Estara listo en breve...";
	}else if(message.dataset.message == "Agregando a tus favoritos.") {
		message.dataset.message = "Agregando a tus favoritos..";
		document.getElementById('message-loading').innerHTML = "Agregando a tus favoritos..";
	}else if(message.dataset.message == "Agregando a tus favoritos..") {
		message.dataset.message = "Agregando a tus favoritos...";
		document.getElementById('message-loading').innerHTML = "Agregando a tus favoritos...";
	}else if(message.dataset.message == "Quitando de tus favoritos.") {
		message.dataset.message = "Quitando de tus favoritos..";
		document.getElementById('message-loading').innerHTML = "Quitando de tus favoritos..";
	}else if(message.dataset.message == "Quitando de tus favoritos..") {
		message.dataset.message = "Quitando de tus favoritos...";
		document.getElementById('message-loading').innerHTML = "Quitando de tus favoritos...";
	}else{
		message.dataset.message = "Ten paciencia...";
		document.getElementById('message-loading').innerHTML = "Ten paciencia...";
	}
}