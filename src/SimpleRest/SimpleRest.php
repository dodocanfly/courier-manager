<?php

namespace Dodocanfly\CourierManager\SimpleRest;

use Dodocanfly\CourierManager\Contracts\RestInterface;
use Dodocanfly\CourierManager\SimpleRest\Exceptions\FailedToConnectException;
use Dodocanfly\CourierManager\SimpleRest\Exceptions\SimpleRestException;


class SimpleRest implements RestInterface
{
    private ?string $url;
    private $curlHandle;


    public function __construct(?string $url = null)
    {
        $this->url = $url;
        $this->curlHandle = curl_init();
        curl_setopt($this->curlHandle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandle, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
    }


    public function setUrl(string $url): void
    {
        $this->url = $url;
    }


    public function post(?array $data = null): array
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, $this->url);
        curl_setopt($this->curlHandle, CURLOPT_POST, true);
        if (is_array($data)) {
            curl_setopt($this->curlHandle, CURLOPT_POSTFIELDS, json_encode($data));
        }

        return $this->getResult();
    }


    public function get(?array $data = null): array
    {
        $url = $this->url;
        if (is_array($data)) {
            $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        curl_setopt($this->curlHandle, CURLOPT_URL, $url);

        return $this->getResult();
    }


    private function getResult(): array
    {
        $result = curl_exec($this->curlHandle);
        if ($result === false) {
            $errorNumber = curl_errno($this->curlHandle);
            $errorMessage = curl_error($this->curlHandle);
            switch ($errorNumber) {
                case 7:
                    throw new FailedToConnectException('SimpleRest: Failed to connect() to host or proxy.');
                default:
                    throw new SimpleRestException($errorMessage . ' ('. $errorNumber .')');
            }
        }
        return json_decode($result, true);
    }


    public function __destruct()
    {
        curl_close($this->curlHandle);
    }
}