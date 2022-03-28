<?php

namespace Dodocanfly\CourierManager\Spring;

class ConsigneeAddress extends Address
{
    /**
     * Ship to name [M]
     * @var string $name
     */

    /**
     * Ship to company name [O]
     * @var ?string $company
     */

    /**
     * Ship to address line 1 [M]
     * @var string $addressLine1
     */

    /**
     * Ship to address line 2 [O]
     * @var ?string $addressLine2
     */

    /**
     * Ship to address line 3 [O]
     * @var ?string $addressLine3
     */

    /**
     * Ship to city [M]
     * @var string $city
     */

    /**
     * Ship to state (2/3 letter ISO code, mandatory for USA, Canada and Australia) [M/O]
     * @var ?string $state
     */

    /**
     * Ship to zipcode (mandatory for countries using postal code system) [M/O]
     * @var ?string $zip
     */

    /**
     * Ship to country (2 letter ISO code) [M]
     * @var string $country
     */

    /**
     * Ship to telephone number [M]
     * @var string $phone
     */

    /**
     * Ship to Email [M]
     * @var string $email
     */

    /**
     * Ship to VAT number (Mandatory for destination BR) [M/O]
     * @var ?string $vat
     */

    /**
     * Id received from GetLocations command. Used for Collect services. [O]
     */
    private ?string $pudoLocationId = null;


    public function setPudoLocationId(string $pudoLocationId): self
    {
        $this->pudoLocationId = $pudoLocationId;
        return $this;
    }


    public function get(): array
    {
        $consigneeAddress = [
            'Name' => $this->name,
            'AddressLine1' => $this->addressLine1,
            'City' => $this->city,
            'Country' => $this->country,
            'Phone' => $this->phone,
            'Email' => $this->email,
        ];
        if ($this->company !== null) $consigneeAddress['Company'] = $this->company;
        if ($this->addressLine2 !== null) $consigneeAddress['AddressLine2'] = $this->addressLine2;
        if ($this->addressLine3 !== null) $consigneeAddress['AddressLine3'] = $this->addressLine3;
        if ($this->state !== null) $consigneeAddress['State'] = $this->state;
        if ($this->zip !== null) $consigneeAddress['Zip'] = $this->zip;
        if ($this->vat !== null) $consigneeAddress['Vat'] = $this->vat;
        if ($this->pudoLocationId !== null) $consigneeAddress['PudoLocationId'] = $this->pudoLocationId;
        return $consigneeAddress;
    }
}