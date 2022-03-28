<?php

namespace Dodocanfly\CourierManager\Spring;

use Dodocanfly\CourierManager\Contracts\RestInterface;
use Dodocanfly\CourierManager\Spring\Exceptions\SpringResponseException;

class Spring
{
//    private const API_URL = 'https://mtapi.net';
    private const API_URL = 'https://mtapi.net/?testMode=1';

    private string $apiKey = '';
    private RestInterface $rest;
    private Validator $validator;


    public function __construct(string $apikey, RestInterface $rest)
    {
        $this->apiKey = $apikey;
        $this->rest = $rest;
        $this->rest->setUrl(self::API_URL);
        $this->validator = new Validator();
    }


    private function sendRequest(array $data): array
    {
        $command = $data['Command'];
        $response = $this->rest->post($data);

        if ($response['ErrorLevel'] === 10) {
            throw new SpringResponseException('SpringFatalError (' . $command . '): ' . $response['Error']);
        } elseif ($response['ErrorLevel'] === 1) {
            throw new SpringResponseException('SpringError (' . $command . '): ' . $response['Error']);
        }

        return $response;
    }


    public function orderShipment(Shipment $shipment): array
    {
        $data = [
            'Apikey' => $this->apiKey,
            'Command' => 'OrderShipment',
            'Shipment' => $shipment->get(),
        ];

        $this->validator->validate($data, $data['Shipment']['Service']);

        return $this->sendRequest($data);
    }


    public function getShipmentLabel(string $trackingNumber): array
    {
        $data = [
            'Apikey' => $this->apiKey,
            'Command' => 'GetShipmentLabel',
            'Shipment' => [
                'TrackingNumber' => $trackingNumber,
            ],
        ];

        return $this->sendRequest($data);
    }
}
