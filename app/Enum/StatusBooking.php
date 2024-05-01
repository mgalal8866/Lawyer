<?php

namespace App\Enum;


enum StatusBooking: int
{
    case panding = 0;
    case accept = 1;
    case notaccept = 2;

    public function getLabelText(): string
    {
        return match ($this) {
            self::panding  => 'panding',
            self::notaccept  => 'notaccept',
            self::accept  => 'accept',
        };
    }
    public function getLabelColor(): string
    {
        return match ($this) {
            self::panding => 'bg-warning',
            self::accept => 'bg-success',
            self::notaccept => 'bg-danger',
        };
    }
    public function getLabelHtml(): string
    {
        return sprintf('<span class="badge   %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }

}
