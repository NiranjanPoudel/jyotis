<?php
require '../vendor/autoload.php';

use Jyotish\Base\Data;
use Jyotish\Base\Locality;
use Jyotish\Base\Analysis;
use Jyotish\Ganita\Method\Swetest;
use Jyotish\Dasha\Dasha;
$Locality = new Locality([
            'longitude' => "11.09",
            'latitude' => "79.6",
            'altitude' => 0,
            ]);
$DateTime = new DateTime();
$DateTime->setTimezone(new DateTimeZone('Asia/Kolkata'));
$DateTime->setDate(2001, 2, 3);
$DateTime->setTime(19,18);
$Ganita = new Swetest(["swetest" => "./vendor/kunjara/swetest/win/"]);
// for linux
// run sudo apt install libswe-dev
// after that use 
// $Ganita = new Swetest(["swetest" => "/usr/bin/"]);
$data = new Data($DateTime, $Locality, $Ganita);
// To Calculate Panchangam
$data->calcParams();

$data->calcRising();

$data->calcPanchanga();

// To calculate Upagraha
$data->calcUpagraha();

// To calculate Birth chart Divisions
$data->calcVargaData(["D1","D2","D3","D4","D7","D9","D10","D12",
"D16","D20","D24","D27","D30","D40","D45","D60"]);
?>