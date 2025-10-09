<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Card = 'card';
    case Bank = 'bank';
    case COD = 'cod';
    case Wallet = 'wallet';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}