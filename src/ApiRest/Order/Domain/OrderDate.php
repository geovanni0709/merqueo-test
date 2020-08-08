<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Order\Domain;

use DateTime;
use Merqueo\ApiRest\Order\Domain\Exceptions\InvalidTypeException;

/**
 * class OrderDate
 */
final class OrderDate
{
    /**
     * @var string
     */
    private $date;

    /**
     * @param string $date
     */
    public function __construct(string $date)
    {
        $this->setValue($date);
    }

    /**
     * Get value object
     * 
     * @return \DateTime
     */
    public function value()
    {
        return $this->date;
    }

    /**
     * Set value object
     * 
     * @param string $date
     */
    public function setValue(string $date): void
    {
        if (empty($date) || $date === null || !$this->checkIsAValidDate($date)) {
            throw new InvalidTypeException('Invalid type. Must be a string that represents a date');
        }

        $this->date = new DateTime($date);
    }

    /**
     * Check if is a valid date
     * 
     * @param string $date
     * @return bool
     */
    private function checkIsAValidDate($date): bool
    {
        return (bool)strtotime($date);
    }
}