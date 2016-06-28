<?php

use Masknizzer\EnumMasks;
use Masknizzer\MaskFactory;

class TestCase extends PHPUnit_Framework_TestCase
{

    public function genericDataProvider()
    {
        $maskFactory = new MaskFactory();

        return [
            [
                'maskFactory' => $maskFactory,
                'maskEnum'    => EnumMasks::PHONE_NUMBER_8(),
                'wordToMask'  => '53142325'

            ],
            [
                'maskFactory' => $maskFactory,
                'maskEnum'    => EnumMasks::POSTAL_CODE(),
                'wordToMask'  => '25254121'

            ]
        ];
    }

    /**
     * @dataProvider genericDataProvider
     */
    public function testFactory(MaskFactory $maskFactory, EnumMasks $maskEnum, $wordToMask){
        $mask = $maskFactory->factory($maskEnum, $wordToMask);
        $this->assertInstanceOf('Masknizzer\MaskField', $mask);
    }

    /**
     *
     */
    public function testQuantityFieldsAndInvalidMask()
    {

    }
}