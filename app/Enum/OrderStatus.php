<?php

namespace App\Enum;

enum OrderStatus: string
{
    case ORDER_RECEIVED = 'received';
    case ORDER_COMPLETED = 'completed';

    public function label(): string
    {
        return match($this) {
            self::ORDER_RECEIVED => 'Ricevuto',
            self::ORDER_COMPLETED => 'Completato',
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
