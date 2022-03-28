<?php

namespace Dodocanfly\CourierManager\Spring;

class Shipment
{
    /**
     * Label format [O]
     * Accepted values: PDF, PNG, ZPL300, ZPL200, ZPL, EPL
     */
    private ?string $labelFormat = null;

    /**
     * Reference number for the shipment. Only unique values accepted. [M]
     */
    private string $shipperReference = '';

    /**
     * Order number as communicated to the consumer. Mandatory for commercial returns (BACK). [O]
     */
    private ?string $orderReference = null;

    /**
     * Date order was placed. Format: yyyy-mm-dd. Optional for commercial returns (BACK). [O]
     */
    private ?string $orderDate = null;

    /**
     * Field that can be used for an internal reference. [O]
     * Will also generate a 2nd barcode on the label if populated.
     */
    private ?string $displayId = null;

    /**
     * Number that will be displayed on the commercial invoice [O]
     */
    private ?string $invoiceNumber = null;

    /**
     * Service [M]
     * See API manual, chapter 2.10 GetServices command for a list of possible
     * and enabled services or ask your Spring customer service which service
     * codes to use. Example value: PPTT
     */
    private string $service = '';

    /**
     * Total weight of the order [M]
     */
    private string $weight = '';

    /**
     * Weight unit [O]
     * Accepted values: kg, lb
     */
    private ?string $weightUnit = null;

    /**
     * Length dimension of the order [O]
     */
    private ?string $length = null;

    /**
     * Width dimension of the order [O]
     */
    private ?string $width = null;

    /**
     * Height dimension of the order [O]
     */
    private ?string $height = null;

    /**
     * Accepted value is: cm [O]
     */
    private ?string $dimUnit = null;

    /**
     * Total value of the order [M/O]
     */
    private ?string $value = null;

    /**
     * Shipping costs charged to the receiver of the parcel [O]
     */
    private ?string $shippingValue = null;

    /**
     * Currency of the value on the CN22/23 information [O]
     */
    private ?string $currency = null;

    /**
     * Customs duty
     * Accepted values: DDU, DDP [O]
     */
    private ?string $customsDuty = null;

    /**
     * Description of the order [O]
     */
    private ?string $description = null;

    /**
     * Declaration type [O]
     * Accepted values: SaleOfGoods, Documents, Gift, ReturnedGoods and CommercialSample
     */
    private ?string $declarationType = null;

    /**
     * Dangerous goods
     * Accepted values: Y, N
     */
    private string $dangerousGoods = 'N';

    /**
     * Only applicable for service BACK, IMPRT and NOLABEL [O]
     */
    private ?string $exportCarrierName = null;

    /**
     * Only applicable for service BACK, IMPRT and NOLABEL [O]
     */
    private ?string $exportAwb = null;

    /**
     * Consignor address
     */
    private array $consignorAddress;

    /**
     * Consignee address
     */
    private array $consigneeAddress;

    /**
     * Products array
     */
    private ?array $products = null;


    public function setLabelFormat(string $labelFormat): self
    {
        $this->labelFormat = $labelFormat;
        return $this;
    }


    public function setShipperReference(string $shipperReference): self
    {
        $this->shipperReference = $shipperReference;
        return $this;
    }


    public function setOrderReference(string $orderReference): self
    {
        $this->orderReference = $orderReference;
        return $this;
    }


    public function setOrderDate(string $orderDate): self
    {
        $this->orderDate = $orderDate;
        return $this;
    }


    public function setDisplayId(string $displayId): self
    {
        $this->displayId = $displayId;
        return $this;
    }


    public function setInvoiceNumber(string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }


    public function setService(string $service): self
    {
        $this->service = $service;
        return $this;
    }


    public function setWeight(string $weight): self
    {
        $this->weight = $weight;
        return $this;
    }


    public function setWeightUnit(string $weightUnit): self
    {
        $this->weightUnit = $weightUnit;
        return $this;
    }


    public function setLength(string $length): self
    {
        $this->length = $length;
        return $this;
    }


    public function setWidth(string $width): self
    {
        $this->width = $width;
        return $this;
    }


    public function setHeight(string $height): self
    {
        $this->height = $height;
        return $this;
    }


    public function setDimUnit(string $dimUnit): self
    {
        $this->dimUnit = $dimUnit;
        return $this;
    }


    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }


    public function setShippingValue(string $shippingValue): self
    {
        $this->shippingValue = $shippingValue;
        return $this;
    }


    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }


    public function setCustomsDuty(string $customsDuty): self
    {
        $this->customsDuty = $customsDuty;
        return $this;
    }


    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }


    public function setDeclarationType(string $declarationType): self
    {
        $this->declarationType = $declarationType;
        return $this;
    }


    public function setDangerousGoods(string $dangerousGoods): self
    {
        $this->dangerousGoods = $dangerousGoods;
        return $this;
    }


    public function setExportCarrierName(string $exportCarrierName): self
    {
        $this->exportCarrierName = $exportCarrierName;
        return $this;
    }


    public function setExportAwb(string $exportAwb): self
    {
        $this->exportAwb = $exportAwb;
        return $this;
    }


    public function setConsignorAddress(ConsignorAddress $consignorAddress): self
    {
        $this->consignorAddress = $consignorAddress->get();
        return $this;
    }


    public function setConsigneeAddress(ConsigneeAddress $consigneeAddress): self
    {
        $this->consigneeAddress = $consigneeAddress->get();
        return $this;
    }


    public function addProduct(Product $product): self
    {
        if ($this->products === null) $this->products = [];
        $this->products[] = $product->get();
        return $this;
    }


    public function get(): array
    {
        $shipment = [
            'ShipperReference' => $this->shipperReference,
            'Service' => $this->service,
            'Weight' => $this->weight,
            'DangerousGoods' => $this->dangerousGoods,
            'ConsignorAddress' => $this->consignorAddress,
            'ConsigneeAddress' => $this->consigneeAddress,
        ];
        if ($this->labelFormat !== null) $shipment['LabelFormat'] = $this->labelFormat;
        if ($this->orderReference !== null) $shipment['OrderReference'] = $this->orderReference;
        if ($this->orderDate !== null) $shipment['OrderDate'] = $this->orderDate;
        if ($this->displayId !== null) $shipment['DisplayId'] = $this->displayId;
        if ($this->invoiceNumber !== null) $shipment['InvoiceNumber'] = $this->invoiceNumber;
        if ($this->weightUnit !== null) $shipment['WeightUnit'] = $this->weightUnit;
        if ($this->length !== null) $shipment['Length'] = $this->length;
        if ($this->width !== null) $shipment['Width'] = $this->width;
        if ($this->height !== null) $shipment['Height'] = $this->height;
        if ($this->dimUnit !== null) $shipment['DimUnit'] = $this->dimUnit;
        if ($this->value !== null) $shipment['Value'] = $this->value;
        if ($this->shippingValue !== null) $shipment['ShippingValue'] = $this->shippingValue;
        if ($this->currency !== null) $shipment['Currency'] = $this->currency;
        if ($this->customsDuty !== null) $shipment['CustomsDuty'] = $this->customsDuty;
        if ($this->description !== null) $shipment['Description'] = $this->description;
        if ($this->declarationType !== null) $shipment['DeclarationType'] = $this->declarationType;
        if ($this->exportCarrierName !== null) $shipment['ExportCarrierName'] = $this->exportCarrierName;
        if ($this->exportAwb !== null) $shipment['ExportAwb'] = $this->exportAwb;
        if ($this->products !== null) $shipment['Products'] = $this->products;
        return $shipment;
    }
}