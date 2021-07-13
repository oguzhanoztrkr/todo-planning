<?php

namespace App\ValueObjects;

use App\Exceptions\TypeException;

class TaskType
{
    const BUSINESS = 'business';
    const IT = 'it';

    protected $value;

    public function __construct($type)
    {
        $reflection = new \ReflectionClass($this);
        if (! in_array($type, $reflection->getConstants())) {
            throw new TypeException(__('validation.not_in', ['attribute' => $type]));
        }

        $this->setValue($type);

        return $this;
    }

    public function isIt()
    {
        return $this->equals(static::it());
    }

    public function isBusiness()
    {
        return $this->equals(static::business());
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function equals(TaskType $type)
    {
        return $type->getValue() === $this->getValue();
    }

    public static function it()
    {
        return new static(self::IT);
    }

    public static function business()
    {
        return new static(self::BUSINESS);
    }
}
