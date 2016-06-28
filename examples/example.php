<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Masknizzer\EnumMasks;
use Masknizzer\MaskFactory;

$maskFieldPostalCode = MaskFactory::factory(EnumMasks::POSTAL_CODE(), 91234111);
echo $maskFieldPostalCode->mask();
echo '<br>';

$maskFieldPhoneNumber = MaskFactory::factory(EnumMasks::PHONE_NUMBER_8(), 8525141577);
echo $maskFieldPhoneNumber->mask();
echo '<br>';

function dd($data)
{
    echo '<pre>';
    print_r($data);
    die;
}