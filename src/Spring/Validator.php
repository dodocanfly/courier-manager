<?php

namespace Dodocanfly\CourierManager\Spring;

use Dodocanfly\CourierManager\Spring\Exceptions\FieldValueTooLongException;

class Validator
{
    private const FIELD_LENGTHS = [
        'Shipment' => [
            'Weight' => [ # Shipment => Weight
                'PPLEU' => 30,
                'PPLGE' => 30,
                'PPLGU' => 30,
                'RM24' => 20,
                'RM24S' => 20,
                'RM48' => 20,
                'RM482' => 20,
                'RM48S' => 20,
                'PPTT' => 2,
                'PPTR' => 2,
                'PPNT' => 2,
                'SEND' => 20,
                'SEND2' => 20,
                'ITCR' => 20,
                'HEHDS' => 20,
                'CPHD' => 20,
                'CPHDS' => 20,
                'SCST' => 10,
                'SCSTS' => 10,
                'SCEX' => 10,
                'SCEXS' => 10,
                'PPND' => 30,
                'PPNDS' => 30,
                'PPHD' => 30,
                'PPHDS' => 30,
            ],
            'DisplayId' => [ # Shipment => DisplayId
                'PPLEU' => 15,
                'PPLGE' => 15,
                'PPLGU' => 15,
                'RM24' => 15,
                'RM24S' => 15,
                'RM48' => 15,
                'RM482' => 15,
                'RM48S' => 15,
                'PPTT' => 15,
                'PPTR' => 15,
                'PPNT' => 15,
                'SEND' => 15,
                'SEND2' => 15,
                'ITCR' => 15,
                'HEHDS' => 15,
                'CPHD' => 15,
                'CPHDS' => 15,
                'SCST' => 15,
                'SCSTS' => 15,
                'SCEX' => 15,
                'SCEXS' => 15,
                'PPND' => 15,
                'PPNDS' => 15,
                'PPHD' => 15,
                'PPHDS' => 15,
            ],
            'Description' => [ # Shipment => Description
//                'PPLEU' => 0,
                'PPLGE' => 105,
                'PPLGU' => 105,
//                'RM24' => 0,
//                'RM24S' => 0,
//                'RM48' => 0,
//                'RM482' => 0,
//                'RM48S' => 0,
                'PPTT' => 20,
                'PPTR' => 20,
                'PPNT' => 20,
//                'SEND' => 0,
//                'SEND2' => 0,
                'ITCR' => 60,
//                'HEHDS' => 0,
//                'CPHD' => 0,
//                'CPHDS' => 0,
//                'SCST' => 0,
//                'SCSTS' => 0,
//                'SCEX' => 0,
//                'SCEXS' => 0,
//                'PPND' => 0,
//                'PPNDS' => 0,
//                'PPHD' => 0,
//                'PPHDS' => 0,
            ],
            'ConsignorAddress' => [
                'Company' => [ # Shipment => ConsignorAddress => Company
                    'PPLEU' => 30,
                    'PPLGE' => 60,
                    'PPLGU' => 60,
                    'RM24' => 25,
                    'RM24S' => 25,
                    'RM48' => 25,
                    'RM482' => 25,
                    'RM48S' => 25,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
//                    'SEND' => 0,
//                    'SEND2' => 0,
//                    'ITCR' => 0,
                    'HEHDS' => 40,
                    'CPHD' => 25,
                    'CPHDS' => 25,
//                    'SCST' => 0,
//                    'SCSTS' => 0,
//                    'SCEX' => 0,
//                    'SCEXS' => 0,
                    'PPND' => 30,
                    'PPNDS' => 30,
                    'PPHD' => 30,
                    'PPHDS' => 30,
                ],
            ],
            'ConsigneeAddress' => [
                'Name' => [ # Shipment => ConsigneeAddress => Name
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 35,
                    'RM24S' => 35,
                    'RM48' => 35,
                    'RM482' => 35,
                    'RM48S' => 35,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 20,
                    'SEND2' => 20,
                    'ITCR' => 60,
                    'HEHDS' => 20,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'Company' => [ # Shipment => ConsigneeAddress => Company
                    'PPLEU' => 35,
                    'PPLGE' => 30,
                    'PPLGU' => 30,
                    'RM24' => 35,
                    'RM24S' => 35,
                    'RM48' => 35,
                    'RM482' => 35,
                    'RM48S' => 35,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 60,
                    'HEHDS' => 20,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'AddressLine1' => [ # Shipment => ConsigneeAddress => AddressLine1
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 35,
                    'RM24S' => 35,
                    'RM48' => 35,
                    'RM482' => 35,
                    'RM48S' => 35,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 60,
//                    'HEHDS' => 0,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'AddressLine2' => [ # Shipment => ConsigneeAddress => AddressLine2
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 35,
                    'RM24S' => 35,
                    'RM48' => 35,
                    'RM482' => 35,
                    'RM48S' => 35,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 60,
//                    'HEHDS' => 0,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'AddressLine3' => [ # Shipment => ConsigneeAddress => AddressLine3
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 35,
                    'RM24S' => 35,
                    'RM48' => 35,
                    'RM482' => 35,
                    'RM48S' => 35,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 60,
//                    'HEHDS' => 0,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'City' => [ # Shipment => ConsigneeAddress => City
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 30,
                    'RM24S' => 30,
                    'RM48' => 30,
                    'RM482' => 30,
                    'RM48S' => 30,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 60,
//                    'HEHDS' => 0,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'State' => [ # Shipment => ConsigneeAddress => State
                    'PPLEU' => 35,
                    'PPLGE' => 50,
                    'PPLGU' => 50,
                    'RM24' => 30,
                    'RM24S' => 30,
                    'RM48' => 30,
                    'RM482' => 30,
                    'RM48S' => 30,
                    'PPTT' => 30,
                    'PPTR' => 30,
                    'PPNT' => 30,
                    'SEND' => 35,
                    'SEND2' => 35,
                    'ITCR' => 50,
//                    'HEHDS' => 0,
                    'CPHD' => 35,
                    'CPHDS' => 35,
                    'SCST' => 35,
                    'SCSTS' => 35,
                    'SCEX' => 35,
                    'SCEXS' => 35,
                    'PPND' => 35,
                    'PPNDS' => 35,
                    'PPHD' => 35,
                    'PPHDS' => 35,
                ],
                'Zip' => [ # Shipment => ConsigneeAddress => Zip
                    'PPLEU' => 20,
                    'PPLGE' => 20,
                    'PPLGU' => 20,
                    'RM24' => 20,
                    'RM24S' => 20,
                    'RM48' => 20,
                    'RM482' => 20,
                    'RM48S' => 20,
                    'PPTT' => 20,
                    'PPTR' => 20,
                    'PPNT' => 20,
                    'SEND' => 6,
                    'SEND2' => 6,
                    'ITCR' => 5,
                    'HEHDS' => 5,
                    'CPHD' => 20,
                    'CPHDS' => 20,
                    'SCST' => 20,
                    'SCSTS' => 20,
                    'SCEX' => 20,
                    'SCEXS' => 20,
                    'PPND' => 20,
                    'PPNDS' => 20,
                    'PPHD' => 20,
                    'PPHDS' => 20,
                ],
                'Phone' => [ # Shipment => ConsigneeAddress => Phone
                    'PPLEU' => 15,
                    'PPLGE' => 15,
                    'PPLGU' => 15,
//                    'RM24' => 0,
//                    'RM24S' => 0,
//                    'RM48' => 0,
//                    'RM482' => 0,
//                    'RM48S' => 0,
                    'PPTT' => 15,
                    'PPTR' => 15,
                    'PPNT' => 15,
                    'SEND' => 15,
                    'SEND2' => 15,
                    'ITCR' => 15,
                    'HEHDS' => 15,
//                    'CPHD' => 0,
//                    'CPHDS' => 0,
//                    'SCST' => 0,
//                    'SCSTS' => 0,
//                    'SCEX' => 0,
//                    'SCEXS' => 0,
                    'PPND' => 15,
                    'PPNDS' => 15,
                    'PPHD' => 15,
                    'PPHDS' => 15,
                ],
//                'Email' => [ # Shipment => ConsigneeAddress => Email
//                    'PPLEU' => 0,
//                    'PPLGE' => 0,
//                    'PPLGU' => 0,
//                    'RM24' => 0,
//                    'RM24S' => 0,
//                    'RM48' => 0,
//                    'RM482' => 0,
//                    'RM48S' => 0,
//                    'PPTT' => 0,
//                    'PPTR' => 0,
//                    'PPNT' => 0,
//                    'SEND' => 0,
//                    'SEND2' => 0,
//                    'ITCR' => 0,
//                    'HEHDS' => 0,
//                    'CPHD' => 0,
//                    'CPHDS' => 0,
//                    'SCST' => 0,
//                    'SCSTS' => 0,
//                    'SCEX' => 0,
//                    'SCEXS' => 0,
//                    'PPND' => 0,
//                    'PPNDS' => 0,
//                    'PPHD' => 0,
//                    'PPHDS' => 0,
//                ],
            ],
        ],
    ];


    private function validateLength($dataArray, $service, $lengths = null, ?string $path = null)
    {
        foreach ($dataArray as $key => $value) {
            if (is_array($value)) {
                $this->validateLength($value, $service, $lengths[$key], $key);
            } else {
                if (array_key_exists($key, $lengths) && strlen($value) > $lengths[$key][$service]) {
                    throw new FieldValueTooLongException(
                        'SpringValidation: ' . $path . ' / ' . $key . ' is too long (max '.$lengths[$key][$service].')'
                    );
                }
            }
        }
    }


    public function validate(array $data, $service)
    {
        $this->validateLength($data, $service, self::FIELD_LENGTHS);
    }
}