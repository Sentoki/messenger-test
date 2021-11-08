<?php

declare(strict_types=1);

namespace App\Messenger;

class Message
{
    public function __construct(
        private string $someText,
        /** @var InnerClass[] */
        private array $arrayOfObjects = [],
    ) {
    }

    public function getSomeText(): string
    {
        return $this->someText;
    }

    public function setSomeText(string $someText): self
    {
        $this->someText = $someText;
        return $this;
    }

    /**
     * @return InnerClass[]
     */
    public function getArrayOfObjects(): array
    {
        return $this->arrayOfObjects;
    }

    /**
     * @param InnerClass[] $arrayOfObjects
     *
     * @return self
     */
    public function setArrayOfObjects(array $arrayOfObjects): self
    {
        $this->arrayOfObjects = $arrayOfObjects;
        return $this;
    }

    public function addObject(InnerClass $object)
    {
        $this->arrayOfObjects[] = $object;
    }
}