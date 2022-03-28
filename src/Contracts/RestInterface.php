<?php

namespace Dodocanfly\CourierManager\Contracts;

interface RestInterface
{
    public function __construct(?string $url);
    public function get(?array $data): array;
    public function post(?array $data): array;
    public function setUrl(string $url): void;
}
