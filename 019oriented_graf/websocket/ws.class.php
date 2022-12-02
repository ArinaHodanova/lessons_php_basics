<?
require_once dirname(__DIR__,1) . '/canvas/vertex.class.php';
class Websocket 
{
	protected $address = 'localhost';
	protected $port = 8001;
	protected $server;
	protected $browsers=[];
	protected $vertex_json;
	public function start()
	{
	//	$key = "dGhlIHNhbXBsZSBub25jZQ==";
	//	$key_acc = base64_encode(sha1($key."258EAFA5-E914-47DA-95CA-C5AB0DC85B11",true));
	//	echo "accept: \n".$key_acc."\n";
		$this->server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_set_option($this->server, SOL_SOCKET, SO_REUSEADDR, 1);
		socket_bind($this->server, $this->address, $this->port);
		socket_listen($this->server);
		while(true)
		{
			$s = socket_accept($this->server);
			$request = socket_read($s, 5000);
			echo $request;
			if (preg_match('#Sec-WebSocket-Key: (.*)\r\n#', $request, $matches))
			{
				$key = base64_encode(pack(
					'H*',
					sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')
				));
				$headers = "HTTP/1.1 101 Switching Protocols\r\n";
				$headers .= "Upgrade: websocket\r\n";
				$headers .= "Connection: Upgrade\r\n";
				$headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
				echo $headers;
				socket_write($s, $headers, strlen($headers));
				$this->browsers[]=$s;
				continue;
			} 
			if (preg_match('#add_vertex #',$request))
			{
				$cmd = explode(" ",$request);
				print_r($cmd);
				if(4 == count($cmd)) 
				{
					$this->vertex = new graph( $cmd[1], $cmd[2], $cmd[3]);
					echo "add vertex $cmd[1]".PHP_EOL;
				}
				print_r($this->vertex);
				socket_close($s);
				continue;
			}
			/*
			if (preg_match('#send_vertex#',$request))
			{
				socket_write($s,json_encode($this->vertex));
				socket_close($s);
				continue;
			}
			 */
			if (preg_match('#get_vertex_json#',$request))
			{
				echo "sending vertex json".PHP_EOL.PHP_EOL;
				//socket_write($s,json_encode($this->vertex));
				socket_write($s,$this->vertex_json);
				socket_close($s);
				continue;
			}
			if (preg_match('#send_vertex_json#',$request))
			{
				socket_write($s,"Accepting vertex".PHP_EOL.PHP_EOL);
				$this->vertex_json = socket_read($s,5000);
				socket_close($s);
				$this->send_vertex_update();
				continue;
			}
			if ("stop" == trim($request)) {
				socket_close($this->server);
				foreach($this->browsers as $soc)
				{
					socket_close($soc);
				}
				break;
			}
			else
			{
				
				$response = chr(129).chr(strlen($request)).$request;
				foreach($this->browsers as $soc)
				{
					socket_write($soc,$response);
				}
				socket_close($s) ;
			}
		}
	}
	public function send_vertex($vertex)
	{
		$r = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($r,$this->address,$this->port);
		socket_write($r,"send_vertex_json");
		$responce = socket_read($r,5000);
		echo $responce;
		socket_write($r,json_encode($vertex));
		socket_close($r);
	}
	protected function send_vertex_update()
	{
		$request = "vertex_update";
		$response = chr(129).chr(strlen($request)).$request;
		foreach($this->browsers as $soc)
		{
			socket_write($soc,$response);
		}
	}
	public function get_vertex()
	{
		$r = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($r,$this->address,$this->port);
		socket_write($r,"get_vertex_json");
		$v = socket_read($r,5000);
		socket_close($r);
		return $v;
	}
}
