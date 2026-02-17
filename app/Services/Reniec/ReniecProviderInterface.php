<?php

namespace App\Services\Reniec;

interface ReniecProviderInterface
{
    public function findByDni(string $dni): ?array;
}
