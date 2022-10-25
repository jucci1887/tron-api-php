<?php
include_once '../vendor/autoload.php';

$fullNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \Jucci1887\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \Jucci1887\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\Jucci1887\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress('address');
$tron->setPrivateKey('privateKey');

try {
    $transfer = $tron->send( 'ToAddress', 1);
} catch (\Jucci1887\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);