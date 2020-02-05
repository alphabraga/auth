<?php

require 'vendor/autoload.php';


/* 
	cookies como true para manter os cookies entre as requisições 
	Precisamos do cookie de autenticação
*/

$client = new \GuzzleHttp\Client(['cookies' => true]);

/* Faz a autenticação */
$client->request('GET', 
							 'url-do-tosplus', 
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

//Pego o json do corpo da requisição, que é um json
$jsonString = $response->getBody();

//essa funcção vai transformar uma a string json em um array de objetos
$dados = json_decode($jsonString);

//faço um loop no array de objetos, veja que o loop tem que 
//começar com o $dados[1]...
foreach ($dados[1] as $pesagem){

	//mesma logica aqui, os dados da pesagem estão no elemento 1 do array
	// e ele é um objeto
	$pesagemObjeto =  $pesagem[1];

	echo '################################' . PHP_EOL;

    echo $pesagemObjeto->cliente . PHP_EOL;
    echo $pesagemObjeto->cnpjCliente . PHP_EOL;
    echo $pesagemObjeto->motorista . PHP_EOL;
    echo $pesagemObjeto->cpfMotorista . PHP_EOL;
    echo $pesagemObjeto->transportador . PHP_EOL;
    echo $pesagemObjeto->cnpjTransp . PHP_EOL;
    echo $pesagemObjeto->navio . PHP_EOL;
    echo $pesagemObjeto->placa . PHP_EOL;
    echo $pesagemObjeto->balanca . PHP_EOL;
    echo $pesagemObjeto->fluxo . PHP_EOL;
    echo $pesagemObjeto->ticket . PHP_EOL;
    echo $pesagemObjeto->bl . PHP_EOL;
    echo $pesagemObjeto->di . PHP_EOL;
    echo $pesagemObjeto->marca  . PHP_EOL;
    echo $pesagemObjeto->codigoNcm . PHP_EOL;
    echo $pesagemObjeto->pesoTara . PHP_EOL;
    echo $pesagemObjeto->pesoLiquido . PHP_EOL;
    echo $pesagemObjeto->pesoBruto . PHP_EOL;
    echo $pesagemObjeto->dataTara . PHP_EOL;
    echo $pesagemObjeto->dataPeso . PHP_EOL;


}