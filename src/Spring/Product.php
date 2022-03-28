<?php

namespace Dodocanfly\CourierManager\Spring;

class Product
{
    /**
     * Description of the product [M]
     */
    private string $description = '';

    /**
     * Stock Keeping Unit [O]
     */
    private ?string $sku = null;

    /**
     * Harmonized System Codes. 6-10 characters [M]
     */
    private string $hsCode = '';

    /**
     * Origin country of the product (2 letter ISO code) [O]
     */
    private ?string $originCountry = null;

    /**
     * URL to image of the product. Mandatory for commercial returns (BACK) [O]
     */
    private ?string $imgUrl = null;

    /**
     * URL to webshop. [O]
     */
    private ?string $purchaseUrl = null;

    /**
     * Quanity of the product [M]
     */
    private string $quantity = '';

    /**
     * Total value of the product(s) (Single Item Value * Quantity) [M]
     */
    private string $value = '';

    /**
     * Total weight of the product(s) (Single Item Weight * Quantity) [M/O]
     */
    private string $weight = '';

    /**
     * Only applicable for commercials returns (BACK).
     * Number of days the item can be returned by consumers.
     * Defaults to customer setting if not specified. [O]
     */
    private ?string $daysForReturn = null;

    /**
     * Only applicable for commercials returns (BACK). Accepted values: Y, N.
     * Default is N. Specify Y if product is not eligible for a commercial return. [O]
     */
    private ?string $nonReturnable = null;


    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }


    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }


    public function setHsCode(string $hsCode): self
    {
        $this->hsCode = $hsCode;
        return $this;
    }


    public function setOriginCountry(string $originCountry): self
    {
        $this->originCountry = $originCountry;
        return $this;
    }


    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;
        return $this;
    }


    public function setPurchaseUrl(string $purchaseUrl): self
    {
        $this->purchaseUrl = $purchaseUrl;
        return $this;
    }


    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }


    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }


    public function setWeight(string $weight): self
    {
        $this->weight = $weight;
        return $this;
    }


    public function setDaysForReturn(string $daysForReturn): self
    {
        $this->daysForReturn = $daysForReturn;
        return $this;
    }


    public function setNonReturnable(string $nonReturnable): self
    {
        $this->nonReturnable = $nonReturnable;
        return $this;
    }


    public function get(): array
    {
        $product = [
            'Description' => $this->description,
            'HsCode' => $this->hsCode,
            'Quantity' => $this->quantity,
            'Value' => $this->value,
            'Weight' => $this->weight,
        ];
        if ($this->sku !== null) $product['Sku'] = $this->sku;
        if ($this->originCountry !== null) $product['OriginCountry'] = $this->originCountry;
        if ($this->imgUrl !== null) $product['ImgUrl'] = $this->imgUrl;
        if ($this->purchaseUrl !== null) $product['PurchaseUrl'] = $this->purchaseUrl;
        if ($this->daysForReturn !== null) $product['DaysForReturn'] = $this->daysForReturn;
        if ($this->nonReturnable !== null) $product['NonReturnable'] = $this->nonReturnable;
        return $product;
    }
}