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

    public function invalidArgunetExceptionDataProvider()
    {
        $maskFactory = new MaskFactory();

        return [
            [
                'maskFactory' => $maskFactory,
                'maskEnum'    => EnumMasks::PHONE_NUMBER_8(),
                'wordToMask'  => '1234567'

            ],
            [
                'maskFactory' => $maskFactory,
                'maskEnum'    => EnumMasks::POSTAL_CODE(),
                'wordToMask'  => '123456'

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
     * @dataProvider invalidArgunetExceptionDataProvider
     *
     * @expectedException \InvalidArgumentException
     */
    public function testQuantityFieldsAndInvalidMask(MaskFactory $maskFactory, EnumMasks $maskEnum, $wordToMask)
    {
        $maskFactory->factory($maskEnum, $wordToMask)->mask();
    }
}