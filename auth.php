<?php

require 'vendor/autoload.php';


/* 
	cookies como true para manter os cookies entre as requisições 
	Precisamos do cookie de autenticação
*/

$client = new \GuzzleHttp\Client(['cookies' => true]);

/* Faz a autenticação */
$client->request('GET', 
							 'http://www.endereco.do.tosplus/tosp', 
							 [
								'query' => ['portal' => 'ORG'],
								'auth' => ['seu-usuario', 'sua-senha']
							]);


/* Faz a consulta */
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
