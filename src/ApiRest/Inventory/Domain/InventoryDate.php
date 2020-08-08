<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Domain;

use DateTime;
use Merqueo\ApiRest\Inventory\Domain\Exceptions\InvalidTypeException;

/**
 * class InventoryDate
 */
final class InventoryDate
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