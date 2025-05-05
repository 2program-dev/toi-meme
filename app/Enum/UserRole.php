<?php

namespace App\Enum;

enum UserRole: string
{
    case ADMIN_ROLE = 'admin';
    case CUSTOMER_ROLE = 'customer';

    public function label(): string
    {
        return match($this) {
            self::ADMIN_ROLE => 'Amministratore',
            self::CUSTOMER_ROLE => 'Cliente',
        };
    }

    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => $case->label(), self::cases())
        );
    }
}
