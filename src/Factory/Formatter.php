<?php

namespace FakeData\Factory;

class Formatter
{
    private static $defaultProviders = ['Address', 'Barcode', 'Biased', 'Color', 'Company', 'DateTime', 
                                        'File', 'HtmlLorem', 'Image', 'Internet', 'Lorem', 'Medical', 
                                        'Miscellaneous', 'Payment', 'Person', 'PhoneNumber', 'Text', 
                                        'UserAgent', 'Uuid', 'Version'
                                        ];
    private static $customProviders  = [];
    
    
    public static function include(string $classname){
        self::$customProviders[] = $classname;
    }

    public static function get(string $formatter){
        foreach(self::$customProviders as $custom){
            if(class_exists($custom) && method_exists($custom, $formatter)){
                $rm = new \ReflectionMethod($custom, $formatter);
                if($rm->isPublic()){
                    return $custom;
                }
            }
        }
        
        foreach (static::$defaultProviders as $provider){
            $providerClassname = self::findProviderClassname($provider);
            
            if(method_exists($providerClassname, $formatter)){
                return $providerClassname; 
            }
        }

        throw new \InvalidArgumentException(sprintf('Unknown formatter "%s" for locale "%s"', $formatter, Locale::get()));        
    }

    /**
     * @param string $provider
     * @param string $locale
     *
     * @return string
     */
    private static function findProviderClassname($provider)
    {
        $locale = Locale::get();
        
        $provider_with_locale = sprintf('FakeData\Provider\%s\%s', $locale, $provider);

        if(class_exists($provider_with_locale, true)) {
            return $provider_with_locale;
        }       

        $provider_without_locale = sprintf('FakeData\Provider\%s', $provider);

        if(class_exists($provider_without_locale, true)) {
            return $provider_without_locale;
        } 

        throw new \InvalidArgumentException(sprintf('Unable to find provider "%s" with locale "%s"', $provider, $locale));
    }

}
