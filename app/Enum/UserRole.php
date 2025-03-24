<?php

namespace App\Enum;

enum UserRole: string
{
    case Admin = 'admin';
    case Customer = 'customer';

    public function label(): string
    {
        return match($this) {
            self::Admin => 'Amministratore',
            self::Customer => 'Cliente',
        };
    }
}
