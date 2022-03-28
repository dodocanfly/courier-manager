<?php

use Dodocanfly\CourierManager\SimpleRest\Exceptions\FailedToConnectException;
use Dodocanfly\CourierManager\SimpleRest\SimpleRest;
use Dodocanfly\CourierManager\Spring\Exceptions\FieldValueTooLongException;
use Dodocanfly\CourierManager\Spring\Exceptions\SpringResponseException;
use Dodocanfly\CourierManager\SpringCourier;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * W danych wejściowych nie jest podana waga i API zawsze będzie zwracał błąd.
 * Aby potestować inne scenariusze, należy do którejść z tablic wejściowych
 * (np. $order) dodać wagę, a następnie obsłużyć to w klasie SpringCourier
 * (src/SpringCourier.php), linia 56.
 */

$order = [
    'sender_company' => 'BaseLinker',
    'sender_fullname' => 'Jan Kowalski',
    'sender_address' => 'Kopernika 10',
    'sender_city' => 'Gdansk',
    'sender_postalcode' => '80208',
    'sender_email' => '',
    'sender_phone' => '666666666',

    'delivery_company' => 'Spring GDS',
    'delivery_fullname' => 'Maud Driant',
    'delivery_address' => 'Strada Foisorului, Nr. 16, Bl. F11C, Sc. 1, Ap. 10',
    'delivery_city' => 'Bucuresti, Sector 3',
    'delivery_postalcode' => '031179',
    'delivery_country' => 'RO',
    'delivery_email' => 'john@doe.com',
    'delivery_phone' => '555555555',
];

$params = [
    'api_key' => 'your-spring-xbs-api-key',
    'label_format' => 'PDF',
    'service' => 'PPTT',
];


$spring = new SpringCourier(new SimpleRest());


try {

    $trackingNumber = $spring->newPackage($order, $params);
    echo "New package tracking number: $trackingNumber \n";

} catch (FailedToConnectException | FieldValueTooLongException | SpringResponseException $exception) {

    echo $exception->getMessage() . "\n";

}


if (!isset($trackingNumber)) exit;


try {

    $pdf = $spring->packagePDF($trackingNumber);
    file_put_contents(__DIR__ . '/label-'.$trackingNumber.'.pdf', $pdf);
    echo "Label $trackingNumber saved. \n";

} catch (SpringResponseException $exception) {

    echo $exception->getMessage() . "\n";

}
