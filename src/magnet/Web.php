<?php

namespace magnet;

use Klein\Klein;

class Web {
    private $biltegia;
    private $txanMotorra;
    private $menua;
    
    public function __construct(Biltegia $biltegia, TxanMotorra $txanMotorra) {
	$this->biltegia = $biltegia;
	$this->txanMotorra = $txanMotorra;
    }
    
    public function hasi() {
	$klein = new Klein();
	$klein->respond('GET', '/', [$this, 'index']);
	$klein->dispatch();
    }
    
    public function index() {
	try {
	    $liburuak = $this->biltegia->lortuLiburuak();
	    $egileak = $this->biltegia->lortuEgileak();
	    $erabiltzaileak = $this->biltegia->lortuErabiltzaileak();
	    echo $this->txanMotorra->errendatu('index', ['liburuak' => $liburuak,
							 'egileak' => $egileak,
							 'erabiltzaileak' => $erabiltzaileak]);
	} catch (\Exception $e) {
	    echo 'Errorea.';
	}
    }
}
