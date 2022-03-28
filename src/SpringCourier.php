<?php

namespace Dodocanfly\CourierManager;

use Dodocanfly\CourierManager\Contracts\CourierInterface;
use Dodocanfly\CourierManager\Contracts\RestInterface;
use Dodocanfly\CourierManager\Spring\ConsigneeAddress;
use Dodocanfly\CourierManager\Spring\ConsignorAddress;
use Dodocanfly\CourierManager\Spring\Shipment;
use Dodocanfly\CourierManager\Spring\Spring;

class SpringCourier implements CourierInterface
{
    private RestInterface $rest;
    private string $apiKey = '';


    public function __construct(RestInterface $rest)
    {
        $this->rest = $rest;
    }


    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }


    public function newPackage(array $order, array $params): string
    {
        $this->setApiKey($params['api_key']);

        $consignorAddress = (new ConsignorAddress())
            ->setCompany($order['sender_company'])
            ->setName($order['sender_fullname'])
            ->setAddress($order['sender_address'])
            ->setCity($order['sender_city'])
            ->setZip($order['sender_postalcode'])
            ->setEmail($order['sender_email'])
            ->setPhone($order['sender_phone']);

        $consigneeAddress = (new ConsigneeAddress())
            ->setCompany($order['delivery_company'])
            ->setName($order['delivery_fullname'])
            ->setAddress($order['delivery_address'])
            ->setCity($order['delivery_city'])
            ->setZip($order['delivery_postalcode'])
            ->setCountry($order['delivery_country'])
            ->setEmail($order['delivery_email'])
            ->setPhone($order['delivery_phone']);

        $shipment = (new Shipment())
            ->setLabelFormat($params['label_format'])
            ->setService($params['service'])
//            ->setWeight($order['weight']) # do testów można wpisać na sztywno wartość 1
            ->setConsignorAddress($consignorAddress)
            ->setConsigneeAddress($consigneeAddress);

        $spring = new Spring($params['api_key'], $this->rest);

        return $spring->orderShipment($shipment)['Shipment']['TrackingNumber'];
    }


    public function packagePDF(string $trackingNumber): string
    {
        $spring = new Spring($this->apiKey, $this->rest);
        return base64_decode($spring->getShipmentLabel($trackingNumber)['Shipment']['LabelImage']);
    }
}
