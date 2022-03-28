<?php

namespace Dodocanfly\CourierManager\Spring;

abstract class Address
{
    protected string $name = '';
    protected ?string $company = null;
    protected ?string $addressLine1 = null;
    protected ?string $addressLine2 = null;
    protected ?string $addressLine3 = null;
    protected ?string $city = null;
    protected ?string $state = null;
    protected ?string $zip = null;
    protected ?string $country = null;
    protected ?string $phone = null;
    protected ?string $email = null;
    protected ?string $vat = null;


    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;
    }


    public function setAddress(string $address, int $lineLength = 30): self
    {
        $address = trim(preg_replace('/\s+/', ' ', $address));
        $address = explode("\n", wordwrap($address, $lineLength, "\n", true));
        $this->addressLine1 = $address[0];
        $this->addressLine2 = array_key_exists(1, $address) ? $address[1] : null;
        $this->addressLine3 = array_key_exists(2, $address) ? $address[2] : null;
        return $this;
    }


    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }


    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }


    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }


    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }


    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function setVat(string $vat): self
    {
        $this->vat = $vat;
        return $this;
    }

    abstract public function get(): array;
}
