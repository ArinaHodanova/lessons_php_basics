<?
class Websocket 
{
	const client_header="/localhost:8000/";
	const chrome_responce = <<<ENDL
101 Switching Protocols
Upgrade: websocket
Connection: Upgrade
ENDL;
	protected $address = 'localhost';
	protected $port = 8001;
	protected $server;
	protected $clients=[];
	public function start()
	{
		$this->server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_bind($this->server, $this->address, $this->port);
		socket_listen($this->server);
		while(true)
		{
			$s = socket_accept($this->server);
			$request = socket_read($s, 5000);
			//if (Websocket::client_header == trim($request))
			if ( preg_match(Websocket::client_header,$request))
			{
				$this->clients[]=$s;
				socket_write($s,Websocket::chrome_responce);
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
