<?php

namespace Dodocanfly\CourierManager\Spring;

class ConsignorAddress extends Address
{
    /**
     * Ship from name. Printed on label as signer of CN23. [M/O]
     * @var string $name
     */

    /**
     * Ship from company name. Printed on label in FROM part. [O]
     * @var string $company
     */

    /**
     * Ship from address line 1 [O]
     * @var string $addressLine1
     */

    /**
     * Ship from address line 2 [O]
     * @var string $addressLine2
     */

    /**
     * Ship from address line 3 [O]
     * @var string $addressLine3
     */

    /**
     * Ship from city [O]
     * @var string $city
     */

    /**
     * Ship from state (2/3 letter ISO code) [O]
     * @var string $state
     */

    /**
     * Ship from zipcode (mandatory for countries using postal code system) [O]
     * @var string $zip
     */

    /**
     * Ship from country (2 letter ISO code) [O]
     * @var string $country
     */

    /**
     * Ship from telephone number [O]
     * @var string $phone
     */

    /**
     * Ship from Email [O]
     * @var string $email
     */

    /**
     * Ship from VAT number [M/O]
     * - For destination Norway: Fill with VOEC number.
     * - Used in Spring CLEAR iOSS+ & Union Oss solution
     * @var string $vat
     */

    /**
     * Ship from Eori [M/O]
     * - For destination GB non-DDP: Fill with the GB123... Eori number.
     * - Used in Spring CLEAR iOSS+ & Union Oss solution
     */
    private ?string $eori = null;

    /**
     * Ship from NL VAT number (Used in Spring CLEAR iOSS+ & Union Oss solution) [M/O]
     */
    private ?string $nlVat = null;

    /**
     * Ship from EU Eori number (Used in Spring CLEAR iOSS+ & Union Oss solution) [M/O]
     */
    private ?string $euEori = null;

    /**
     * Ship from IOSS number (Used in Spring CLEAR iOSS+ & Union Oss solution) [M/O]
     */
    private ?string $ioss = null;


    public function setEori(string $eori): self
    {
        $this->eori = $eori;
        return $this;
    }


    public function setNlVat(string $nlVat): self
    {
        $this->nlVat = $nlVat;
        return $this;
    }


    public function setEuEori(string $euEori): self
    {
        $this->euEori = $euEori;
        return $this;
    }


    public function setIoss(string $euEori): self
    {
        $this->euEori = $euEori;
        return $this;
    }


    public function get(): array
    {
        $consignorAddress['Name'] = $this->name;
        if ($this->company !== null) $consignorAddress['Company'] = $this->company;
        if ($this->addressLine1 !== null) $consignorAddress['AddressLine1'] = $this->addressLine1;
        if ($this->addressLine2 !== null) $consignorAddress['AddressLine2'] = $this->addressLine2;
        if ($this->addressLine3 !== null) $consignorAddress['AddressLine3'] = $this->addressLine3;
        if ($this->city !== null) $consignorAddress['City'] = $this->city;
        if ($this->state !== null) $consignorAddress['State'] = $this->state;
        if ($this->zip !== null) $consignorAddress['Zip'] = $this->zip;
        if ($this->country !== null) $consignorAddress['Country'] = $this->country;
        if ($this->phone !== null) $consignorAddress['Phone'] = $this->phone;
        if ($this->email !== null) $consignorAddress['Email'] = $this->email;
        if ($this->vat !== null) $consignorAddress['Vat'] = $this->vat;
        if ($this->eori !== null) $consignorAddress['Eori'] = $this->eori;
        if ($this->nlVat !== null) $consignorAddress['NlVat'] = $this->nlVat;
        if ($this->euEori !== null) $consignorAddress['EuEori'] = $this->euEori;
        if ($this->ioss !== null) $consignorAddress['Ioss'] = $this->ioss;
        return $consignorAddress;
    }
}