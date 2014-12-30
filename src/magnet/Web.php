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
	$klein->respond('GET', '/', [$this, 'index']);
	$klein->dispatch();
    }
    
    public function index() {
	try {
	    $liburuak = $this->liburuBiltegia->lortuLiburuak();
	    $erabiltzaileak = $this->liburuBiltegia->lortuErabiltzaileak();
	    echo $this->txanMotorra->errendatu('liburuak', ['liburuak' => $liburuak,
							    'erabiltzaileak' => $erabiltzaileak]);
	} catch (\Exception $e) {
	    var_dump($e);
	    echo 'Errorea liburuak eskuratzean.';
	}
    }
}
