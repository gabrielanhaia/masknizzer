# Masknizzer
Masking fields has never been so easy!


# Installation (Instalação)

Installation by composer (Instalação pelo composer):
```sh
composer require gabrielanhaia/masknizzer
```
or add the dependency on your **composer.json** and: (ou adicione a denpendência em seu **composer.json** e:)
```sh
composer install
```


# Use (Uso)
####1 - Creating a new mask (Criando uma nova máscara):
```php
use Eloquent\Enumeration\AbstractEnumeration;

class CustomEnumMasks extends AbstractEnumeration
{
    /** @var string POSTAL_CODE Mask Brazilian postcode. / Máscara para código postal(CEP) Brasileiro. */
    const POSTAL_CODE = '#####-###';

    /** @var string PHONE_NUMBER Mask for 10-digit phone with area code. /
     *                           Máscara para telefone de 10 dígitos junto com código de região.
     */
    const PHONE_NUMBER_10 = '(##) ####-####';

    /** @var string PHONE_NUMBER Mask for 11-digit phone with area code. /
     *                           Máscara para telefone de 10 dígitos junto com código de região.
     */
    const PHONE_NUMBER_11 = '(##) ####-#####';
}
```

*Note: The masks should extender 'Eloquent\Enumeration\AbstractEnumeration' and follow the pattern of the mask defined in '\Masknizzer\EnumMasks'.*

*Observação: As máscaras customizadas devem extender de 'Eloquent\Enumeration\AbstractEnumeration' e as constantes devem seguir o padrão de '\Masknizzer\EnumMasks'.*

####2 - Building a type of object masks. (Construindo um objeto do tipo das máscaras):

```php
use Masknizzer\EnumMasks;
use Masknizzer\MaskFactory;

$maskFieldPostalCode = MaskFactory::factory(EnumMasks::POSTAL_CODE(), 12345678);
```

or pass an Enum array as the first parameter , the function itself will decide which mask to use according to the number of characters of the field passed in the second parameter.

ou passe uma lista de Enum no primeiro parâmetro da factory, a própria classe irá decidir de acordo com o número de caracteres do campo qual máscara irá usar.

```php
$maskGroupPhoneNumber = [
    EnumMasks::PHONE_NUMBER_10(),
    EnumMasks::PHONE_NUMBER_11()
];

$maskFieldPhoneNumbers = MaskFactory::factory($maskGroupPhoneNumber, 51123456789);
```

###3 - Processing the mask in field (Processando a máscara no campo)
```php
$maskedField = $maskFieldPostalCode->mask();
```
In the example the result is (No exemplo o resultado será): **12345-678**