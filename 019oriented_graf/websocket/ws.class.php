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
			}
			/*
			if ( preg_match(Websocket::client_header,$request))
			{
				$sec_key = [];
				$key_acc = "err";
				echo Websocket::sec_key_pattern."sec key\n";
				if ( preg_match(Websocket::sec_key_pattern,$request,$sec_key) )
					$key_acc = base64_encode(sha1($sec_key[1]."258EAFA5-E914-47DA-95CA-C5AB0DC85B11",true));
				//preg_match('/(ss)$/',"ass",$sec_key);
				//print_r($sec_key);
				//print_r($key_acc);
				$headers = "HTTP/1.1 101 Switching Protocols\r\n";
				$headers .= "Upgrade: websocket\r\n";
				$headers .= "Connection: Upgrade\r\n";
				$headers .= "Sec-WebSocket-Version: 13\r\n";
				$headers .= "Sec-WebSocket-Accept: $key_acc\r\n\r\n";
				//$a = sprintf(Websocket::chrome_responce,$key_acc);
				echo "chrome_responce: \n".$headers."\n";
				socket_write($s,$headers);
			}
			elseif ("stop" == trim($request))
			{
				socket_close($this->server);
				break;
			}
			else
			{
				foreach($this->clients as $soc)
				{
					socket_write($soc,$request);
				}
				socket_close($s) ;
			}
			echo $request;
			 */
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
