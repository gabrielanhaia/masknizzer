<?php

use Masknizzer\EnumMasks;
use Masknizzer\MaskFactory;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Data provider for generic tests.
     *
     * @return array
     */
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
     * Data Provider for invalid arguments exception.
     *
     * @return array
     */
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
     * Tests whether the masks are applied correctly .
     *
     * @dataProvider genericDataProvider
     */
    public function testFactory(MaskFactory $maskFactory, EnumMasks $maskEnum, $wordToMask){
        $mask = $maskFactory->factory($maskEnum, $wordToMask);
        $this->assertInstanceOf('Masknizzer\MaskField', $mask);
    }

    /**
     * Tests if an exception is being thrown when is passed by parameter a field with a different length of the mask.
     *
     * @dataProvider invalidArgunetExceptionDataProvider
     *
     * @expectedException \InvalidArgumentException
     */
    public function testQuantityFieldsAndInvalidMask(MaskFactory $maskFactory, EnumMasks $maskEnum, $wordToMask)
    {
        $maskFactory->factory($maskEnum, $wordToMask)->mask();
    }
}