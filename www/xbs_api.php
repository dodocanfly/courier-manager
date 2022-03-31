<?php

class SpringApi
{
    private const API_URL = 'https://mtapi.net/?testMode=1';

    private const FIELD_LENGTHS = [
        'Shipment' => [
            'DisplayId' => [ # Shipment => DisplayId
                'PPLEU' => 15, 'PPLGE' => 15, 'PPLGU' => 15, 'RM24' => 15, 'RM24S' => 15, 'RM48' => 15, 'RM482' => 15,
                'RM48S' => 15, 'PPTT' => 15, 'PPTR' => 15, 'PPNT' => 15, 'SEND' => 15, 'SEND2' => 15, 'ITCR' => 15,
                'HEHDS' => 15, 'CPHD' => 15, 'CPHDS' => 15, 'SCST' => 15, 'SCSTS' => 15, 'SCEX' => 15, 'SCEXS' => 15,
                'PPND' => 15, 'PPNDS' => 15, 'PPHD' => 15, 'PPHDS' => 15,
            ],
            'Description' => [ # Shipment => Description
                'PPLGE' => 105, 'PPLGU' => 105, 'PPTT' => 20, 'PPTR' => 20, 'PPNT' => 20, 'ITCR' => 60,
            ],
            'ConsignorAddress' => [
                'Company' => [ # Shipment => ConsignorAddress => Company
                    'PPLEU' => 30, 'PPLGE' => 60, 'PPLGU' => 60, 'RM24' => 25, 'RM24S' => 25, 'RM48' => 25,
                    'RM482' => 25, 'RM48S' => 25, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'HEHDS' => 40,
                    'CPHD' => 25, 'CPHDS' => 25, 'PPND' => 30, 'PPNDS' => 30, 'PPHD' => 30, 'PPHDS' => 30,
                ],
            ],
            'ConsigneeAddress' => [
                'Name' => [ # Shipment => ConsigneeAddress => Name
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 35, 'RM24S' => 35, 'RM48' => 35,
                    'RM482' => 35, 'RM48S' => 35, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 20, 'SEND2' => 20,
                    'ITCR' => 60, 'HEHDS' => 20, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35,
                    'SCEXS' => 35, 'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'Company' => [ # Shipment => ConsigneeAddress => Company
                    'PPLEU' => 35, 'PPLGE' => 30, 'PPLGU' => 30, 'RM24' => 35, 'RM24S' => 35, 'RM48' => 35,
                    'RM482' => 35, 'RM48S' => 35, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 60, 'HEHDS' => 20, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35,
                    'SCEXS' => 35, 'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'AddressLine1' => [ # Shipment => ConsigneeAddress => AddressLine1
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 35, 'RM24S' => 35, 'RM48' => 35,
                    'RM482' => 35, 'RM48S' => 35, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 60, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35, 'SCEXS' => 35,
                    'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'AddressLine2' => [ # Shipment => ConsigneeAddress => AddressLine2
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 35, 'RM24S' => 35, 'RM48' => 35,
                    'RM482' => 35, 'RM48S' => 35, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 60, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35, 'SCEXS' => 35,
                    'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'AddressLine3' => [ # Shipment => ConsigneeAddress => AddressLine3
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 35, 'RM24S' => 35, 'RM48' => 35,
                    'RM482' => 35, 'RM48S' => 35, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 60, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35, 'SCEXS' => 35,
                    'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'City' => [ # Shipment => ConsigneeAddress => City
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 30, 'RM24S' => 30, 'RM48' => 30,
                    'RM482' => 30, 'RM48S' => 30, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 60, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35, 'SCEXS' => 35,
                    'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'State' => [ # Shipment => ConsigneeAddress => State
                    'PPLEU' => 35, 'PPLGE' => 50, 'PPLGU' => 50, 'RM24' => 30, 'RM24S' => 30, 'RM48' => 30,
                    'RM482' => 30, 'RM48S' => 30, 'PPTT' => 30, 'PPTR' => 30, 'PPNT' => 30, 'SEND' => 35, 'SEND2' => 35,
                    'ITCR' => 50, 'CPHD' => 35, 'CPHDS' => 35, 'SCST' => 35, 'SCSTS' => 35, 'SCEX' => 35, 'SCEXS' => 35,
                    'PPND' => 35, 'PPNDS' => 35, 'PPHD' => 35, 'PPHDS' => 35,
                ],
                'Zip' => [ # Shipment => ConsigneeAddress => Zip
                    'PPLEU' => 20, 'PPLGE' => 20, 'PPLGU' => 20, 'RM24' => 20, 'RM24S' => 20, 'RM48' => 20,
                    'RM482' => 20, 'RM48S' => 20, 'PPTT' => 20, 'PPTR' => 20, 'PPNT' => 20, 'SEND' => 6, 'SEND2' => 6,
                    'ITCR' => 5, 'HEHDS' => 5, 'CPHD' => 20, 'CPHDS' => 20, 'SCST' => 20, 'SCSTS' => 20, 'SCEX' => 20,
                    'SCEXS' => 20, 'PPND' => 20, 'PPNDS' => 20, 'PPHD' => 20, 'PPHDS' => 20,
                ],
                'Phone' => [ # Shipment => ConsigneeAddress => Phone
                    'PPLEU' => 15, 'PPLGE' => 15, 'PPLGU' => 15, 'PPTT' => 15, 'PPTR' => 15, 'PPNT' => 15, 'SEND' => 15,
                    'SEND2' => 15, 'ITCR' => 15, 'HEHDS' => 15, 'PPND' => 15, 'PPNDS' => 15, 'PPHD' => 15, 'PPHDS' => 15,
                ],
            ],
        ],
    ];


    private string $apiKey = '';
    private string $error = '';
    private $handle;


    public function __construct(string $apiKey = '')
    {
        $this->apiKey = $apiKey;
        $this->init();
    }


    private function init(): void
    {
        $this->handle = curl_init();
        curl_setopt($this->handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->handle, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($this->handle, CURLOPT_URL, self::API_URL);
        curl_setopt($this->handle, CURLOPT_POST, true);
    }


    public function post(array $data): array
    {
        $this->error = '';
        curl_setopt($this->handle, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($this->handle);
        if ($result === false) {
            $errorNumber = curl_errno($this->handle);
            $errorMessage = curl_error($this->handle);
            switch ($errorNumber) {
                case 7:
                    $this->error = 'Failed to connect to host or proxy.';
                    break;
                default:
                    $this->error = $errorMessage . ' ('. $errorNumber .')';
            }
            return [];
        }
        return json_decode($result, true);
    }


    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }


    public function newPackage(array $order, array $params): string
    {
        $this->setApiKey($params['api_key']);

        $sender_address = trim(preg_replace('/\s+/', ' ', $order['sender_address']));
        $sender_address = explode("\n", wordwrap($sender_address, 30, "\n", true));
        $delivery_address = trim(preg_replace('/\s+/', ' ', $order['delivery_address']));
        $delivery_address = explode("\n", wordwrap($delivery_address, 30, "\n", true));

        $data = [
            'Apikey' => $params['api_key'],
            'Command' => 'OrderShipment',
            'Shipment' => [
                'LabelFormat' => $params['label_format'],
                'Service' => $params['service'],
                'ConsignorAddress' => [
                    'Company' => $order['sender_company'],
                    'Name' => $order['sender_fullname'],
                    'AddressLine1' => $sender_address[0],
                    'City' => $order['sender_city'],
                    'Zip' => $order['sender_postalcode'],
                    'Email' => $order['sender_email'],
                    'Phone' => $order['sender_phone'],
                ],
                'ConsigneeAddress' => [
                    'Company' => $order['delivery_company'],
                    'Name' => $order['delivery_fullname'],
                    'AddressLine1' => $delivery_address[0],
                    'City' => $order['delivery_city'],
                    'Zip' => $order['delivery_postalcode'],
                    'Country' => $order['delivery_country'],
                    'Email' => $order['delivery_email'],
                    'Phone' => $order['delivery_phone'],
                ],
            ],
        ];

        if (array_key_exists('weight', $order)) $data['Shipment']['Weight'] = $order['weight'];
        if (array_key_exists(1, $sender_address)) $data['Shipment']['ConsignorAddress']['AddressLine2'] = $sender_address[0];
        if (array_key_exists(2, $sender_address)) $data['Shipment']['ConsignorAddress']['AddressLine3'] = $sender_address[2];
        if (array_key_exists(1, $delivery_address)) $data['Shipment']['ConsigneeAddress']['AddressLine2'] = $delivery_address[1];
        if (array_key_exists(2, $delivery_address)) $data['Shipment']['ConsigneeAddress']['AddressLine3'] = $delivery_address[2];

        $this->validate($data, $data['Shipment']['Service']);
        if ($this->error) return '';

        $response = $this->post($data);
        $this->checkErrors($response);

        return $this->error ? '' : $response['Shipment']['TrackingNumber'];
    }


    public function packagePDF(string $trackingNumber): string
    {
        $data = [
            'Apikey' => $this->apiKey,
            'Command' => 'GetShipmentLabel',
            'Shipment' => [
                'TrackingNumber' => $trackingNumber,
            ],
        ];

        $response = $this->post($data);
        $this->checkErrors($response);

        return $this->error ? '' : base64_decode($response['Shipment']['LabelImage']);
    }


    private function checkErrors(array $response)
    {
        if ($response['ErrorLevel'] === 10) {
            $this->error = 'FatalError: ' . $response['Error'];
        } elseif ($response['ErrorLevel'] === 1) {
            $this->error = 'Error: ' . $response['Error'];
        }
    }


    public function getError(): string
    {
        return $this->error;
    }


    private function validateLength($dataArray, $service, $lengths = null, ?string $path = null)
    {
        foreach ($dataArray as $key => $value) {
            if (is_array($value)) {
                $this->validateLength($value, $service, $lengths[$key], $key);
            } else {
                if (array_key_exists($key, $lengths) && strlen($value) > $lengths[$key][$service]) {
                    $this->error = 'Error: ' . $path . ' / ' . $key . ' is too long (max '.$lengths[$key][$service].')';
                    return;
                }
            }
        }
    }


    private function validate(array $data, $service)
    {
        $this->validateLength($data, $service, self::FIELD_LENGTHS);
    }


    public function __destruct()
    {
        curl_close($this->handle);
    }
}