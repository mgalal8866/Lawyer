<?php

namespace App\Enum;


enum StatusIssue: int
{
    case unactive = 0;
    case active = 1;
    case accept = 2;

    public function getLabelText(): string
    {
        return match ($this) {
            self::unactive  => 'unactive',
            self::active  => 'active',
            self::accept  => 'accept',
        };
    }
    public function getLabelColor(): string
    {
        return match ($this) {
            self::active => 'bg-success',
            self::accept => 'bg-success',
            self::unactive => 'bg-danger',
        };
    }
    public function getLabelHtml(): string
    {
        return sprintf('<span class="badge badge-glow %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }

}
