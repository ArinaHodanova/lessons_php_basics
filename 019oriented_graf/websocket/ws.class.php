<?
class Websocket 
{
	const client_header="/localhost:8000/";
	const chrome_responce = <<<ENDL
HTTP/1.1 101 Switching Protocols
Upgrade: websocket
Connection: Upgrade
Sec-WebSocket-Version: 13
Sec-WebSocket-Accept: %s


ENDL;
	protected $address = 'localhost';
	protected $port = 8001;
	protected $server;
	protected $clients=[];
	const sec_key_pattern = '/Sec-WebSocket-Key: (.*)/';
	public function start()
	{
		$key = "dGhlIHNhbXBsZSBub25jZQ==";
		$key_acc = base64_encode(sha1($key."258EAFA5-E914-47DA-95CA-C5AB0DC85B11",true));
		echo "accept: \n".$key_acc."\n";
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
				$this->clients[]=$s;
			} elseif ("stop" == trim($request)) {
				socket_close($this->server);
				foreach($this->clients as $soc)
				{
					socket_close($soc);
				}
				break;
			}
			else
			{
				
				$response = chr(129).chr(strlen($request)).$request;
				foreach($this->clients as $soc)
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
		socket_write($r,json_encode($vertex));
		socket_close($r);
	}
}
