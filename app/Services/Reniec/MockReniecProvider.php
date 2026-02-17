<?php

namespace App\Services\Reniec;

class MockReniecProvider implements ReniecProviderInterface
{
    public function findByDni(string $dni): ?array
    {
        $mockRecords = [
            '12345678' => ['nombres' => 'Ana María', 'apellidos' => 'Pérez Rojas'],
            '87654321' => ['nombres' => 'Luis Alberto', 'apellidos' => 'Quispe Flores'],
        ];

        return $mockRecords[$dni] ?? null;
    }
}
