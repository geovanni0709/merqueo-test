<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Order\Domain;

use Merqueo\ApiRest\Order\Domain\OrderProductId;

/**
 * class OrderEntity
 */
final class OrderEntity
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var int
     */
    private $customerAddressId;

    /**
     * @var OrderDate
     */
    private $orderDate;

    /**
     * @var OrderStatus
     */
    private $orderStatus;

    public function __construct(
        int $customerId,
        int $customerAddressId,
        OrderStaus $orderStatus,
        OrderDate $orderDate,
        ?int $id
    ){
        $this->customerId = $customerId;
        $this->customerAddressId = $customerAddressId;
        $this->orderStatus = $orderStatus;
        $this->orderDate = $orderDate;
        $this->id = $id;
    }

    /**
     * Return an instance of same class from array data
     * 
     * @param array $data
     * @return this
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (int)$data['customer_id'],
            (int)$data['customer_address_id'],
            new OrderStatus((float)$data['status']),
            new OrderDate($data['order_date']),
            (int)$data['id']
        );
    }

    /**
     * Identitity
     * 
     * @return mixed null|int
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * Customer Id VO
     * 
     * @return int
     */
    public function customerId(): int
    {
        return $this->customerId;
    }

    /**
     * Customer Address Id VO
     * 
     * @return int
     */
    public function customerAddressId(): int
    {
        return $this->customerAddressId;
    }

    /**
     * Status VO
     * 
     * @return OrderStatus
     */
    public function status(): OrderStatus
    {
        return $this->orderStatus;
    }

    /**
     * Order date VO
     * 
     * @return OrderDate
     */
    public function orderDate(): OrderDate
    {
        return $this->inventoryDate;
    }

    /**
     * Conver to array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'customer_id' => $this->customerId()->value(),
            'customer_address_id' => $this->customerAddressId()->value(),
            'status' => $this->status()->value(),
            'delivery_date' => $this->OrderDate()->value()
        ];
    }
}