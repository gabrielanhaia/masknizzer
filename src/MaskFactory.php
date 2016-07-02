<?php

namespace Masknizzer;
use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Mask objects factory, responsible for building objects.
 * Fábrica de objetos de máscara, responsável por construir os objetos.
 *
 * Class MaskFactory
 * @package Masknizzer
 * 
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MaskFactory
{
    /**
     * MaskField creates a type of the object according to the last mask.
     * Cria um objeto do tipo MaskField de acordo com a máscara passada.
     *
     * @param AbstractEnumeration[]|AbstractEnumeration $mask Mask to be applied in a field. / Máscara a ser aplicada em um campo.
     * @param string $field Field to be applied to mask. / Campo a aplicar a máscara.
     * @return MaskField
     */
    public static function factory($mask, $field)
    {
        if (!is_array($mask)) {
            $mask = [$mask];
        }

        return new MaskField($mask, $field);
    }
}
