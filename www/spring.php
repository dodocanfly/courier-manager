<?php

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
//    'weight' => 1,
    /**
     * DO WYGENEROWANIA PRZESYŁKI POTRZEBNA JEST JEJ WAGA,
     * TAKŻE DO TESTÓW NALEŻY ODKOMENTOWAĆ POWYŻSZĄ WARTOŚĆ
     */
];

/**
 * PROSZĘ ZMIENIĆ PONIŻE KLUCZ API NA POPRAWNY
 */
$params = [
    'api_key' => 'your-spring-xbs-api-key',
    'label_format' => 'PDF',
    'service' => 'PPTT',
];

include __DIR__ . '/xbs_api.php';

$trackingNumber = $_POST['trackingNumber'];
$message = '';
$error = '';


// 1. Create courier object
// 2. Create shipment
// 3. Get shipping label and force a download dialog


if ($_POST['action'] === 'newPackage') {

    $spring = new SpringApi();
    if ($trackingNumber = $spring->newPackage($order, $params)) {
        $message = 'Numer nowej przesyłki: ' . $trackingNumber;
    } else {
        $error = $spring->getError();
    }

}


if ($_POST['action'] === 'packagePDF') {

    $spring = new SpringApi();
    if ($pdf = $spring->setApiKey($params['api_key'])->packagePDF($trackingNumber)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=label-'.$trackingNumber.'.pdf');
        echo $pdf;
        exit;
    } else {
        $error = $spring->getError();
    }

}

?><html lang="pl">
<head>
    <title>Spring</title>
</head>
<body>
<a href="/spring.php">home</a>
<form action="spring.php" method="post">
    <h1 style="color: green;"><?=$message?></h1>
    <h1 style="color: red;"><?=$error?></h1>
    <button type="submit" name="action" value="newPackage">newPackage</button>
    <hr>
    <label>
        tracking number:
        <input name="trackingNumber" value="<?=$trackingNumber?>">
    </label>
    <button type="submit" name="action" value="packagePDF">packagePDF</button>
</form>
</body>
</html>