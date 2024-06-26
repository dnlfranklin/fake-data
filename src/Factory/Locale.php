<?php

namespace FakeData\Factory;


class Locale{

    public const LOCALES = [
        'EN'    => 'en_US',
        'ES'    => 'es_ES',
        'FR'    => 'fr_FR',
        'IT'    => 'it_IT',
        'BR'    => 'pt_BR'
    ];
    
    private static $locale = 'pt_BR';
    

    public static function get(){
        return self::$locale;
    }

    public static function set(string $locale){
        if(array_key_exists(strtoupper($locale), self::LOCALES)){
            self::$locale = self::LOCALES[strtoupper($locale)];

            return;
        }

        if(in_array($locale, self::LOCALES)){
            self::$locale = $locale;
        }
    }

}