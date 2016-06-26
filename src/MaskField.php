<?php

namespace Masknizzer;

/**
 * Class responsible for applying the masks to the fields.
 * Classe responsável por aplicar as máscaras aos campos.
 *
 * Class MaskField
 * @package Masknizzer
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MaskField
{
    /** @var string CHARACTER_MASKS Replacement character in the mask application.
     *                              Carácter de substituição na aplicação da máscara.
     */
    const CHARACTER_MASKS = '#';

    /** @var EnumMasks $mask Mask to be applied in the field. / Máscara a ser aplicada no campo. */
    protected $mask;

    /** @var string $field Field to apply the mask. / Campo a ser aplicado a máscara. */
    protected $field;

    /**
     * MaskFactory constructor.
     * @param EnumMasks $mask Máscara a ser aplicada no campo
     * @param string $field Campo a ser aplicado a máscara
     */
    public function __construct(EnumMasks $mask, $field)
    {
        $this->mask = $mask;
        $this->field = (string) $field;
    }

    /**
     * Apply the masks to the field.
     * Aplica as máscaras ao campo.
     *
     * @return string
     */
    public function mask()
    {
        $textMask = $this->mask->value();
        $maskSize = substr_count($textMask, self::CHARACTER_MASKS);

        if ($maskSize != strlen($this->field)) {
            throw new \InvalidArgumentException(
                'The value passed to the mask is incompatible with the shape of the mask.'
            );
        }

        $maskedField = '';
        $counterField = 0;
        for ($counterMask = 0; $counterField <= strlen($this->field)-1; $counterMask++) {
            if ($textMask[$counterMask] == self::CHARACTER_MASKS) {
                $maskedField .= $this->field[$counterField];
                $counterField++;
            } else {
                $maskedField .= $textMask[$counterMask];
            }
        }

        return $maskedField;
    }

    /**
     * Set a value for the application of the mask.
     * Seta um valor para aplicação da máscara.
     *
     * @param string $field
     * @return MaskFactory
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Returns a value for the application of the mask.
     * Retorna um valor para aplicação da máscara.
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set a Mask.
     * Define uma Máscara.
     *
     * @param EnumMasks $mask
     * @return MaskFactory
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
        return $this;
    }

    /**
     * Returns the Mask.
     * Retorna a Máscara.
     *
     * @return EnumMasks
     */
    public function getMask()
    {
        return $this->mask;
    }
}
