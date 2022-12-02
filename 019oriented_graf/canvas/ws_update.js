
function update_vertex(){
	const xmlhttp = new XMLHttpRequest();
	xmlhttp.onload = function() {
		const vert = JSON.parse(this.responseText);
		ctx.fillText(vert.name1, vert.xpos, vert.ypos);
	}
	xmlhttp.open("GET", "vertex.update.json.php");
	xmlhttp.send();
}


let socket = new WebSocket("ws://localhost:8001/");
socket.onopen = function(e) {
	  //alert("[open] Соединение установлено");
	  console.log(e);
};

socket.onmessage = function(event) {
	  //alert(`[message] Данные получены с сервера: ${event.data}`);
	  console.log(event);
	  if ( event.data == "vertex_update") update_vertex();
}


socket.onerror = function(error) {
	str = JSON.stringify(error, ["message", "arguments", "type", "name"]);
	  alert(`[error] ${str}`);
};
socket.onerror = function (message, url, line, column, error) {
	    console.log(message, url, line, column, error);
}
