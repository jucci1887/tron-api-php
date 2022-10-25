<?php
$fullNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Jucci1887\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Jucci1887\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


$balance=$tron->getTransactionBuilder()->contractbalance($tron->getAddress);
foreach($balance as $key =>$item)
{
	echo $item["name"]. " (".$item["symbol"].") => " . $item["balance"] . "\n";
}

