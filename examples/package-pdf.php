<?php

use Dodocanfly\CourierManager\SimpleRest\Exceptions\FailedToConnectException;
use Dodocanfly\CourierManager\SimpleRest\SimpleRest;
use Dodocanfly\CourierManager\Spring\Exceptions\SpringResponseException;
use Dodocanfly\CourierManager\SpringCourier;

require_once __DIR__ . '/../vendor/autoload.php';


$apiKey = 'your-spring-xbs-api-key';
$trackingNumber = 'LS002235542NL';


try {

    $spring = new SpringCourier(new SimpleRest());
    $spring->setApiKey($apiKey);
    $pdf = $spring->packagePDF($trackingNumber);
    file_put_contents(__DIR__ . '/label-'.$trackingNumber.'.pdf', $pdf);
    echo "Label $trackingNumber saved. \n";

} catch (FailedToConnectException | SpringResponseException $exception) {

    echo $exception->getMessage() . "\n";

}
