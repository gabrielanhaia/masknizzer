<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Masknizzer\EnumMasks;
use Masknizzer\MaskFactory;

$maskFieldPostalCode = MaskFactory::factory(EnumMasks::POSTAL_CODE(), 91234111);
echo $maskFieldPostalCode->mask();
echo '<br>';

$maskFieldPhoneNumber = MaskFactory::factory(EnumMasks::PHONE_NUMBER_10(), 5193699632);
echo $maskFieldPhoneNumber->mask();
echo '<br>';

$maskGroupPhoneNumber = [
    EnumMasks::PHONE_NUMBER_10(),
    EnumMasks::PHONE_NUMBER_11()
];

$maskFieldPhoneNumbers = MaskFactory::factory($maskGroupPhoneNumber, 51936996312);
echo $maskFieldPhoneNumbers->mask();

function dd($data)
{
    echo '<pre>';
    print_r($data);
    die;
}