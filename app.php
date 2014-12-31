<?php

if (file_exists(__DIR__.'/.env')) {
    Dotenv::load(__DIR__);
    Dotenv::required('API_URL');
}

$c = new Pimple\Container();

$c['liburuBiltegia'] = function ($c) {
    return new magnet\ApiBiltegia(getenv('API_URL'));
};

$c['mustache.txantiloiak'] = __DIR__.'/txantiloiak';
$c['mustache'] = function ($c) {
    return new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader($c['mustache.txantiloiak']),
    ]);
};
$c['txan-motorra'] = function ($c) {
    return new magnet\MustacheTxanMotorra($c['mustache']);
};

$c['app'] = function ($c) {
    return new magnet\Web($c['liburuBiltegia'], $c['txan-motorra']);
};

$c['app']->hasi();
