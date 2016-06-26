<?php

namespace Masknizzer;

/**
 * Mask objects factory, responsible for building objects.
 * Fábrica de objetos de máscara, responsável por construir os objetos.
 *
 * Class MaskFactory
 * @package Masknizzer
 */
class MaskFactory
{
    /**
     * MaskField creates a type of the object according to the last mask.
     * Cria um objeto do tipo MaskField de acordo com a máscara passada.
     *
     * @param EnumMasks $mask Mask to be applied in a field. / Máscara a ser aplicada em um campo.
     * @param string $field Field to be applied to mask. / Campo a aplicar a máscara.
     * @return MaskField
     */
    public static function factory(EnumMasks $mask, $field)
    {
        return new MaskField($mask, $field);
    }
}
