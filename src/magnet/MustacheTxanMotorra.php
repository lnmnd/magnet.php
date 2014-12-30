<?php

namespace magnet;

class MustacheTxanMotorra implements TxanMotorra {
    private $mustache;
    
    public function __construct(\Mustache_Engine $mustache) {
	$this->mustache = $mustache;
    }
    
    public function errendatu($txan, $dat) {
	return $this->mustache->render($txan, $dat);
    }
}
