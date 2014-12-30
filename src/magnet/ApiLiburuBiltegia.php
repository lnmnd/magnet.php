<?php

namespace magnet;

use GuzzleHttp\Client;

class ApiLiburuBiltegia implements LiburuBiltegia {
    private $oinarriUrl;
    
    public function __construct($oinarriUrl) {
	$this->oinarriUrl = $oinarriUrl;
    }
    
    public function lortuLiburuak() {
	$bez = new Client();
	$era = $bez->get($this->oinarriUrl.'liburuak?muga=0');
	return $era->json()['liburuak'];
    }

    public function lortuEgileak() {
	$bez = new Client();
	$era = $bez->get($this->oinarriUrl.'egileak?muga=0');
	return $era->json()['egileak'];
    }
    
    public function lortuErabiltzaileak() {
	$bez = new Client();
	$era = $bez->get($this->oinarriUrl.'erabiltzaileak?muga=0');
	return $era->json()['erabiltzaileak'];
    }
}
