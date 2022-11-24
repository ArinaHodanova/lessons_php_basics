var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle = "#F00000";
ctx.textAlign = "center";
ctx.fillText("Hello World", 150, 100);
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
	  const graph = JSON.parse(this.responseText);
	ctx.fillText(graph.name1, graph.xpos, graph.ypos);
}
xmlhttp.open("GET", "graph.json.php");
xmlhttp.send();
