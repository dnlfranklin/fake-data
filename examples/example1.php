<?php

require '../vendor/autoload.php';

class CustomProvider{

    public function somaEMultiplicaRandom(int $a, int $b){
        return ($a + $b) * mt_rand(1,100);
    }

}

\FakeData\Factory\Formatter::include('CustomProvider');

$fake = new FakeData\Generator;
$fake->name();
$fake->streetAddress();
$fake->cnpj();
$fake->somaEMultiplicaRandom(1,2);

// Convertendo localidade para França
\FakeData\Factory\Locale::set('FR');
$fake->nir();

var_dump($fake->getGenerated());
