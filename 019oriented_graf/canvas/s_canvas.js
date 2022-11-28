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
