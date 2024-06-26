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
|citySuffix()|string|Todas|
|streetSuffix()|string|Todas|
|buildingNumber()|string|Todas|
|city()|string|Todas|
|streetName()|string|Todas|
|streetAddress()|string|Todas|
|postcode()|string|Todas|
|address()|string|Todas|
|country()|string|Todas|
|latitude($min = -90, $max = 90)|float|Todas|
|longitude($min = -180, $max = 180)|float|Todas|
|localCoordinates()|float[]|Todas|
|randomDigitNotNull()|int|Todas|
|passthrough($value)|mixed|Todas|
|randomLetter()|string|Todas|
|randomAscii()|string|Todas|
|randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false)|array|Todas|
|randomElement($array = ['a', 'b', 'c'])|mixed|Todas|
|randomKey($array = [])|int|string|null|Todas|
|shuffle($arg = '')|array|string|Todas|
|shuffleArray($array = [])|array|Todas|
|shuffleString($string = '', $encoding = 'UTF-8')|string|Todas|
|numerify($string = '###')|string|Todas|
|lexify($string = '????')|string|Todas|
|bothify($string = '## ??')|string|Todas|
|asciify($string = '****')|string|Todas|
|regexify($regex = '')|string|Todas|
|toLower($string = '')|string|Todas|
|toUpper($string = '')|string|Todas|
|biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt')|int|Todas|
|hexColor()|string|Todas|
|safeHexColor()|string|Todas|
|rgbColorAsArray()|array|Todas|
|rgbColor()|string|Todas|
|rgbCssColor()|string|Todas|
|rgbaCssColor()|string|Todas|
|safeColorName()|string|Todas|
|colorName()|string|Todas|
|hslColor()|string|Todas|
|hslColorAsArray()|array|Todas|
|company()|string|Todas|
|companySuffix()|string|Todas|
|jobTitle()|string|Todas|
|unixTime($max = 'now')|int|Todas|
|dateTime($max = 'now', $timezone = null)|\DateTime|Todas|
|dateTimeAD($max = 'now', $timezone = null)|\DateTime|Todas|
|iso8601($max = 'now')|string|Todas|
|date($format = 'Y-m-d', $max = 'now')|string|Todas|
|time($format = 'H:i:s', $max = 'now')|string|Todas|
|dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)|\DateTime|Todas|
|dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null)|\DateTime|Todas|
|dateTimeThisCentury($max = 'now', $timezone = null)|\DateTime|Todas|
|dateTimeThisDecade($max = 'now', $timezone = null)|\DateTime|Todas|
|dateTimeThisYear($max = 'now', $timezone = null)|\DateTime|Todas|
|dateTimeThisMonth($max = 'now', $timezone = null)|\DateTime|Todas|
|amPm($max = 'now')|string|Todas|
|dayOfMonth($max = 'now')|string|Todas|
|dayOfWeek($max = 'now')|string|Todas|
|month($max = 'now')|string|Todas|
|monthName($max = 'now')|string|Todas|
|year($max = 'now')|string|Todas|
|century()|string|Todas|
|timezone($countryCode = null)|string|Todas|
|setDefaultTimezone($timezone = null)|void|Todas|
|getDefaultTimezone()|string|Todas|
|file($sourceDirectory = '/tmp', $targetDirectory = '/tmp', $fullPath = true)|string|Todas|
|randomHtml($maxDepth = 4, $maxWidth = 4)|string|Todas|
|imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false, string $format = 'png')|string|Todas|
|image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null, $gray = false, string $format = 'png')|string|Todas|
|email()|string|Todas|
|safeEmail()|string|Todas|
|freeEmail()|string|Todas|
|companyEmail()|string|Todas|
|freeEmailDomain()|string|Todas|
|safeEmailDomain()|string|Todas|
|userName()|string|Todas|
|password($minLength = 6, $maxLength = 20)|string|Todas|
|domainName()|string|Todas|
|domainWord()|string|Todas|
|tld()|string|Todas|
|url()|string|Todas|
|slug($nbWords = 6, $variableNbWords = true)|string|Todas|
|ipv4()|string|Todas|
|ipv6()|string|Todas|
|localIpv4()|string|Todas|
|macAddress()|string|Todas|
|word()|string|Todas|
|words($nb = 3, $asText = false)|array|string|Todas|
|sentence($nbWords = 6, $variableNbWords = true)|string|Todas|
|sentences($nb = 3, $asText = false)|array|string|Todas|
|paragraph($nbSentences = 3, $variableNbSentences = true)|string|Todas|
|paragraphs($nb = 3, $asText = false)|array|string|Todas|
|text($maxNbChars = 200)|string|Todas|
|boolean($chanceOfGettingTrue = 50)|bool|Todas|
|md5()|string|Todas|
|sha1()|string|Todas|
|sha256()|string|Todas|
|locale()|string|Todas|
|countryCode()|string|Todas|
|countryISOAlpha3()|string|Todas|
|languageCode()|string|Todas|
|currencyCode()|string|Todas|
|emoji()|string|Todas|
|creditCardType()|string|Todas|
|creditCardNumber($type = null, $formatted = false, $separator = '-')|string|Todas|
|creditCardExpirationDate($valid = true)|\DateTime|Todas|
|creditCardExpirationDateString($valid = true, $expirationDateFormat = null)|string|Todas|
|creditCardDetails($valid = true)|array|Todas|
|iban($countryCode = null, $prefix = '', $length = null)|string|Todas|
|swiftBicNumber()|string|Todas|
|name($gender = null)|string|Todas|
|firstName($gender = null)|string|Todas|
|firstNameMale()|string|Todas|
|firstNameFemale()|string|Todas|
|lastName($gender = null)|string|Todas|
|title($gender = null)|string|Todas|
|titleMale()|string|Todas|
|titleFemale()|string|Todas|
|phoneNumber()|string|Todas|
|e164PhoneNumber()|string|Todas|
|imei()|int|Todas|
|realText($maxNbChars = 200, $indexSize = 2)|string|Todas|
|realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2)|string|Todas|
|macProcessor()|string|Todas|
|linuxProcessor()|string|Todas|
|userAgent()|string|Todas|
|chrome()|string|Todas|
|msedge()|string|Todas|
|firefox()|string|Todas|
|safari()|string|Todas|
|opera()|string|Todas|
|internetExplorer()|string|Todas|
|windowsPlatformToken()|string|Todas|
|macPlatformToken()|string|Todas|
|iosMobileToken()|string|Todas|
|linuxPlatformToken()|string|Todas|
|uuid()|string|Todas|
|fileExtension()|string|Todas|
|filePath()|string|Todas|
|bloodType()|string|Todas|
|bloodRh()|string|Todas|
|bloodRh()|string|Todas|
|bloodGroup()|string|Todas|
|ean13()|string|Todas|
|ean8()|string|Todas|
|isbn10()|string|Todas|
|isbn13()|string|Todas|
|numberBetween($int1 = 0, $int2 = 2147483647)|int|Todas|
|randomDigit()|int|Todas|
|randomDigitNot($except)|int|Todas|
|randomDigitNotZero()|int|Todas|
|randomFloat($nbMaxDecimals = null, $min = 0, $max = null)|float|Todas|
|randomNumber($nbDigits = null, $strict = false)|int|Todas|
|semver($preRelease = false, $build = false)|int|Todas|
|bankAccountNumber()|string|Todas|
|secondaryAddress()|string|Todas|
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