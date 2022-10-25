<?php
$fullNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Jucci1887\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Jucci1887\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}


try {
    $transaction = $tron->getTransactionBuilder()->sendTrx('to', 2,'fromAddress');
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
} catch (\Jucci1887\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}
