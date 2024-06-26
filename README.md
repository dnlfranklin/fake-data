# Fake Data

Biblioteca para gerar dados falsos, baseado na biblioteca FakerPHP/Faker.

## Instalação

Para instalar esta dependência através do [Composer](https://getcomposer.org/).
```shell
composer require bonuscred/fake-data
```

## Utilização

```php
$fake = new FakeData\Generator;

echo $fake->name();
echo $fake->cpf();
echo $fake->cnpj();
```

#### Localidades

FakeData utiliza provedores de dados que são organizados por localidades, onde cada provedor tem suas particularidades na geração de dados. Possui atualmentes as localidades: BR, EN, ES, FR e IT. A localidade padrão é a BR.

```php
$fake = new FakeData\Generator;

echo $fake->name();
echo $fake->streetAddress();

// Convertendo localidade para França
\FakeData\Factory\Locale::set('FR');
echo $fake->nir(); //gerador de nir é apenas disponibilizado com a localidade FR
```

#### Seed

É possível obter sempre os mesmos dados gerados - por exemplo, ao usar o FakeData para fins de teste de unidade. O gerador oferece um método seed(), que propaga o gerador de números aleatórios. Chamar o mesmo script duas vezes com o mesmo seed produz os mesmos resultados.

```php
$fake = new FakeData\Generator;
$fake->seed(12345);

echo $fake->name(); // Bruno Miguel Vale
echo $fake->cpf(); // 183.918.812-02
echo $fake->streetAddress(); // Avenida Karina, 104. Apto 3
```

#### Provedores customizados

É possível criar os próprios geradores de dados a partir de um objeto com métodos públicos. Deve-se usar a função mt_rand() para gerar números aleatórios, permitindo o uso de seed nos novos geradores.

```php
class CustomProvider{
    public function somaEMultiplicaRandom(int $a, int $b)
    {
        return ($a + $b) * mt_rand(1,100);
    }
}

\FakeData\Factory\Formatter::include('CustomProvider');

$fake = new FakeData\Generator;
$fake->seed(12345);

echo $fake->somaEMultiplicaRandom(1,2); //24
```

#### Geradores

| Método | Retorno | Localidades |
|--------|---------|-------------|
|citySuffix()|string|Todas as localidades|
|streetSuffix()|string|Todas as localidades|
|buildingNumber()|string|Todas as localidades|
|city()|string|Todas as localidades|
|streetName()|string|Todas as localidades|
|streetAddress()|string|Todas as localidades|
|postcode()|string|Todas as localidades|
|address()|string|Todas as localidades|
|country()|string|Todas as localidades|
|latitude($min = -90, $max = 90)|float|Todas as localidades|
|longitude($min = -180, $max = 180)|float|Todas as localidades|
|localCoordinates()|float[]|Todas as localidades|
|randomDigitNotNull()|int|Todas as localidades|
|passthrough($value)|mixed|Todas as localidades|
|randomLetter()|string|Todas as localidades|
|randomAscii()|string|Todas as localidades|
|randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false)|array|Todas as localidades|
|randomElement($array = ['a', 'b', 'c'])|mixed|Todas as localidades|
|randomKey($array = [])|int|string|null|Todas as localidades|
|shuffle($arg = '')|array|string|Todas as localidades|
|shuffleArray($array = [])|array|Todas as localidades|
|shuffleString($string = '', $encoding = 'UTF-8')|string|Todas as localidades|
|numerify($string = '###')|string|Todas as localidades|
|lexify($string = '????')|string|Todas as localidades|
|bothify($string = '## ??')|string|Todas as localidades|
|asciify($string = '****')|string|Todas as localidades|
|regexify($regex = '')|string|Todas as localidades|
|toLower($string = '')|string|Todas as localidades|
|toUpper($string = '')|string|Todas as localidades|
|biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt')|int|Todas as localidades|
|hexColor()|string|Todas as localidades|
|safeHexColor()|string|Todas as localidades|
|rgbColorAsArray()|array|Todas as localidades|
|rgbColor()|string|Todas as localidades|
|rgbCssColor()|string|Todas as localidades|
|rgbaCssColor()|string|Todas as localidades|
|safeColorName()|string|Todas as localidades|
|colorName()|string|Todas as localidades|
|hslColor()|string|Todas as localidades|
|hslColorAsArray()|array|Todas as localidades|
|company()|string|Todas as localidades|
|companySuffix()|string|Todas as localidades|
|jobTitle()|string|Todas as localidades|
|unixTime($max = 'now')|int|Todas as localidades|
|dateTime($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeAD($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|iso8601($max = 'now')|string|Todas as localidades|
|date($format = 'Y-m-d', $max = 'now')|string|Todas as localidades|
|time($format = 'H:i:s', $max = 'now')|string|Todas as localidades|
|dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeThisCentury($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeThisDecade($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeThisYear($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|dateTimeThisMonth($max = 'now', $timezone = null)|\DateTime|Todas as localidades|
|amPm($max = 'now')|string|Todas as localidades|
|dayOfMonth($max = 'now')|string|Todas as localidades|
|dayOfWeek($max = 'now')|string|Todas as localidades|
|month($max = 'now')|string|Todas as localidades|
|monthName($max = 'now')|string|Todas as localidades|
|year($max = 'now')|string|Todas as localidades|
|century()|string|Todas as localidades|
|timezone($countryCode = null)|string|Todas as localidades|
|setDefaultTimezone($timezone = null)|void|Todas as localidades|
|getDefaultTimezone()|string|Todas as localidades|
|file($sourceDirectory = '/tmp', $targetDirectory = '/tmp', $fullPath = true)|string|Todas as localidades|
|randomHtml($maxDepth = 4, $maxWidth = 4)|string|Todas as localidades|
|imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false, string $format = 'png')|string|Todas as localidades|
|image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null, $gray = false, string $format = 'png')|string|Todas as localidades|
|email()|string|Todas as localidades|
|safeEmail()|string|Todas as localidades|
|freeEmail()|string|Todas as localidades|
|companyEmail()|string|Todas as localidades|
|freeEmailDomain()|string|Todas as localidades|
|safeEmailDomain()|string|Todas as localidades|
|userName()|string|Todas as localidades|
|password($minLength = 6, $maxLength = 20)|string|Todas as localidades|
|domainName()|string|Todas as localidades|
|domainWord()|string|Todas as localidades|
|tld()|string|Todas as localidades|
|url()|string|Todas as localidades|
|slug($nbWords = 6, $variableNbWords = true)|string|Todas as localidades|
|ipv4()|string|Todas as localidades|
|ipv6()|string|Todas as localidades|
|localIpv4()|string|Todas as localidades|
|macAddress()|string|Todas as localidades|
|word()|string|Todas as localidades|
|words($nb = 3, $asText = false)|array|string|Todas as localidades|
|sentence($nbWords = 6, $variableNbWords = true)|string|Todas as localidades|
|sentences($nb = 3, $asText = false)|array|string|Todas as localidades|
|paragraph($nbSentences = 3, $variableNbSentences = true)|string|Todas as localidades|
|paragraphs($nb = 3, $asText = false)|array|string|Todas as localidades|
|text($maxNbChars = 200)|string|Todas as localidades|
|boolean($chanceOfGettingTrue = 50)|bool|Todas as localidades|
|md5()|string|Todas as localidades|
|sha1()|string|Todas as localidades|
|sha256()|string|Todas as localidades|
|locale()|string|Todas as localidades|
|countryCode()|string|Todas as localidades|
|countryISOAlpha3()|string|Todas as localidades|
|languageCode()|string|Todas as localidades|
|currencyCode()|string|Todas as localidades|
|emoji()|string|Todas as localidades|
|creditCardType()|string|Todas as localidades|
|creditCardNumber($type = null, $formatted = false, $separator = '-')|string|Todas as localidades|
|creditCardExpirationDate($valid = true)|\DateTime|Todas as localidades|
|creditCardExpirationDateString($valid = true, $expirationDateFormat = null)|string|Todas as localidades|
|creditCardDetails($valid = true)|array|Todas as localidades|
|iban($countryCode = null, $prefix = '', $length = null)|string|Todas as localidades|
|swiftBicNumber()|string|Todas as localidades|
|name($gender = null)|string|Todas as localidades|
|firstName($gender = null)|string|Todas as localidades|
|firstNameMale()|string|Todas as localidades|
|firstNameFemale()|string|Todas as localidades|
|lastName($gender = null)|string|Todas as localidades|
|title($gender = null)|string|Todas as localidades|
|titleMale()|string|Todas as localidades|
|titleFemale()|string|Todas as localidades|
|phoneNumber()|string|Todas as localidades|
|e164PhoneNumber()|string|Todas as localidades|
|imei()|int|Todas as localidades|
|realText($maxNbChars = 200, $indexSize = 2)|string|Todas as localidades|
|realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2)|string|Todas as localidades|
|macProcessor()|string|Todas as localidades|
|linuxProcessor()|string|Todas as localidades|
|userAgent()|string|Todas as localidades|
|chrome()|string|Todas as localidades|
|msedge()|string|Todas as localidades|
|firefox()|string|Todas as localidades|
|safari()|string|Todas as localidades|
|opera()|string|Todas as localidades|
|internetExplorer()|string|Todas as localidades|
|windowsPlatformToken()|string|Todas as localidades|
|macPlatformToken()|string|Todas as localidades|
|iosMobileToken()|string|Todas as localidades|
|linuxPlatformToken()|string|Todas as localidades|
|uuid()|string|Todas as localidades|
|fileExtension()|string|Todas as localidades|
|filePath()|string|Todas as localidades|
|bloodType()|string|Todas as localidades|
|bloodRh()|string|Todas as localidades|
|bloodRh()|string|Todas as localidades|
|bloodGroup()|string|Todas as localidades|
|ean13()|string|Todas as localidades|
|ean8()|string|Todas as localidades|
|isbn10()|string|Todas as localidades|
|isbn13()|string|Todas as localidades|
|numberBetween($int1 = 0, $int2 = 2147483647)|int|Todas as localidades|
|randomDigit()|int|Todas as localidades|
|randomDigitNot($except)|int|Todas as localidades|
|randomDigitNotZero()|int|Todas as localidades|
|randomFloat($nbMaxDecimals = null, $min = 0, $max = null)|float|Todas as localidades|
|randomNumber($nbDigits = null, $strict = false)|int|Todas as localidades|
|semver($preRelease = false, $build = false)|int|Todas as localidades|
|bankAccountNumber()|string|Todas as localidades|
|secondaryAddress()|string|Todas as localidades|
|state()|string|BR, EN, ES, IT|
|stateAbbr()|string|BR, EN, IT|
|region()|string|BR, FR|
|regionAbbr()|string|BR|
|cnpj($formatted = true)|string|BR|
|bank()|string|BR|
|suffix()|string|BR, EN, ES, IT|
|cpf($formatted = true)|string|BR|
|rg($formatted = true)|string|BR|
|sufix()|string|BR, EN, ES|
|areaCode()|string|BR, EN|
|cellphone($formatted = true)|string|BR|
|landline($formatted = true)|string|BR|
|phone($formatted = true)|string|BR|
|cellphoneNumber($formatted = true) |string|BR|
|landlineNumber($formatted = true)|string|BR|
|phoneNumberCleared()|string|BR|
|catchPhrase()|string|EN, ES, FR, IT|
|bs()|string|EN,ES,IT|
|ein()|string|EN|
|bankRoutingNumber()|string|EN|
|ssn()|string|EN|
|tollFreeAreaCode()|string|EN|
|tollFreePhoneNumber()|string|EN|
|phoneNumberWithExtension()|string|EN|
|exchangeCode()|string|EN|
|community()|string|ES|
|companyPrefix()|string|ES|
|vat()|string|ES, FR, IT|
|dni()|string|ES|
|licenceCode()|string|ES|
|mobileNumber()|string|ES, FR|
|tollFreeNumber()|string|ES|
|department()|string|FR|
|departmentName()|string|FR|
|departmentNumber()|string|FR|
|catchPhraseNoun()|string|FR|
|catchPhraseAttribute()|string|FR|
|catchPhraseVerb()|string|FR|
|siret()|string|FR|
|siren()|string|FR|
|nir()|string|FR|
|phoneNumber07()|string|FR|
|phoneNumber07WithSeparator()|string|FR|
|phoneNumber08()|string|FR|
|phoneNumber08WithSeparator()|string|FR|
|serviceNumber()|string|FR|
|taxId()|string|IT|

## Requisitos
- PHP 8.0 ou superior