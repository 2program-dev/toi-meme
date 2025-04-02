<?php

namespace App\Enum;

enum OrderStatus: string
{
    case ORDER_RECEIVED = 'received';
    case ORDER_PROCESSING= 'processing';
    case ORDER_COMPLETED = 'completed';
    case ORDER_CANCELED = 'canceled';

    public function label(): string
    {
        return match($this) {
            self::ORDER_RECEIVED => 'Ricevuto',
            self::ORDER_COMPLETED => 'Completato',
            self::ORDER_PROCESSING => 'In lavorazione',
            self::ORDER_CANCELED => 'Annullato',
        };
    }

    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => $case->label(), self::cases())
        );
    }

    public static function badgeColors ($value): string
    {
        return match($value) {
            self::ORDER_RECEIVED->value => 'warning',
            self::ORDER_COMPLETED->value => 'success',
            self::ORDER_PROCESSING->value => 'info',
            self::ORDER_CANCELED->value => 'danger',
        };
    }
}
