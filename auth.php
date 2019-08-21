<?php



require 'vendor/autoload.php';


$client = new \GuzzleHttp\Client(['cookies' => true]);

$client->request('GET', 
							 'http://tos.emap.ma.gov.br/tosp', 
							 [
								'query' => ['portal' => 'ORG'],
								'auth' => ['seu-usuario', 'sua-senha']
							]);


$response = $client->request('POST', 
							 'http://tos.emap.ma.gov.br/tosp/PESAGEMWS/filtrar', 
							 [
							 	'body'  => '["tosp.foundation.core.kernel.coqueryobject.CoQueryObjectDynamic",
												 {"PesagemDTO":["java.util.HashMap",	
														{
															"placa":"",
															"imo":"9672040",
															"cnpjCliente":"14267717000109",
															"pesagemIni":"28/07/2019 01:00",
															"pesagemFim":"31/07/2019 08:00",
															"page":0
														}
													]
								 }]'
							]);

echo $response->getStatusCode();
echo $response->getBody();