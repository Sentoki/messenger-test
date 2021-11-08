<?php

declare(strict_types=1);

namespace App\Messenger;

class InnerClass
{
    public function __construct(
        private string $someText
    ) {
    }

    public function getSomeText(): string
    {
        return $this->someText;
    }
}