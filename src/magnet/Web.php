<?php

namespace magnet;

use Klein\Klein;

class Web {
    private $liburuBiltegia;
    private $txanMotorra;
    private $menua;
    
    public function __construct(LiburuBiltegia $liburuBiltegia, TxanMotorra $txanMotorra) {
	$this->liburuBiltegia = $liburuBiltegia;
	$this->txanMotorra = $txanMotorra;
    }
    
    public function hasi() {
	$klein = new Klein();
	$klein->respond('GET', '/', [$this, 'liburuak']);
	$klein->dispatch();
    }
    
    public function liburuak() {
	try {
	    $liburuak = $this->liburuBiltegia->lortuLiburuak();
	    echo $this->txanMotorra->errendatu('liburuak', ['liburuak' => $liburuak]);
	} catch (\Exception $e) {
	    var_dump($e);
	    echo 'Errorea liburuak eskuratzean.';
	}
    }
}
