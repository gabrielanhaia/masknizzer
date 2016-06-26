<?php
namespace Masknizzer;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Enumerator class that stores all standards of masks available for use in fields.
 * Classe Enumerator que armazena todos os padrões de máscaras disponíveis para a aplicação em campos.
 *
 * Class EnumMasks
 * @package Masknizzer
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EnumMasks extends AbstractEnumeration
{
    /** @var string POSTAL_CODE Mask Brazilian postcode. / Máscara para código postal(CEP) Brasileiro. */
    const POSTAL_CODE = '#####-###';

    /** @var string PHONE_NUMBER Mask to 8-digit phone. / Máscara para telefone de 8 digitos. */
    const PHONE_NUMBER_8 = '(##) ####-####';
}