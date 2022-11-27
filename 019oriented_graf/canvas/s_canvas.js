var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle = "#F00A00";
ctx.textAlign = "center";
const xmlhttp = new XMLHttpRequest();
function putVertex(graph,index,array) {
	ctx.fillText(graph.name1, graph.xpos, graph.ypos);
}
xmlhttp.onload = function() {
	  const graph_arr = JSON.parse(this.responseText);
	  graph_arr.forEach(putVertex);
}
xmlhttp.open("GET", "graph.json.php");
xmlhttp.send();
let socket = new WebSocket("ws://localhost:8001/");

socket.onopen = function(e) {
	  alert("[open] Соединение установлено");
	  socket.send("cli");
};

socket.onmessage = function(event) {
	  alert(`[message] Данные получены с сервера: ${event.data}`);
	  const graph = JSON.parse(event.data);
	ctx.fillText(graph.name1, graph.xpos, graph.ypos);

};
socket.onerror = function(error) {
	str = JSON.stringify(error, ["message", "arguments", "type", "name"]);
	  alert(`[error] ${str}`);
};
socket.onerror = function (message, url, line, column, error) {
	    console.log(message, url, line, column, error);
}
