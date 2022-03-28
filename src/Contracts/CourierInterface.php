<?php

namespace Dodocanfly\CourierManager\Contracts;

interface CourierInterface
{
    public function newPackage(array $order, array $params);
    public function packagePDF(string $trackingNumber): string;
}
