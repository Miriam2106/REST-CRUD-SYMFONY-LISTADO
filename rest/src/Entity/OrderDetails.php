<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDetails
 *
 * @ORM\Table(name="orderdetails", indexes={@ORM\Index(name="orderdetails_ibfk_1", columns={"orderNumber"}), @ORM\Index(name="orderdetails_ibfk_2", columns={"productCode"})})
 * @ORM\Entity
 */
class OrderDetails
{
    /**
     * @var \Orders
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orderNumber", referencedColumnName="orderNumber")
     * })
     */
    private $ordernumber;

    /**
     * @var \Products
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productCode", referencedColumnName="productCode")
     * })
     */
    private  $productcode;

    /**
     * @var int
     *
     * @ORM\Column(name="quantityOrdered", type="integer", nullable=false)
     */
    private $quantityordered;

    /**
     * @var float
     *
     * @ORM\Column(name="priceEach", type="float", precision=10, scale=0, nullable=false)
     */
    private $priceeach;

    /**
     * @var int
     *
     * @ORM\Column(name="orderLineNumber", type="smallint", nullable=false)
     */
    private $orderlinenumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordernumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productcode = new ArrayCollection();
    }

    public function getQuantityordered(): ?int
    {
        return $this->quantityordered;
    }

    public function setQuantityordered(int $quantityordered): self
    {
        $this->quantityordered = $quantityordered;

        return $this;
    }

    public function getPriceeach(): ?float
    {
        return $this->priceeach;
    }

    public function setPriceeach(float $priceeach): self
    {
        $this->priceeach = $priceeach;

        return $this;
    }

    public function getOrderlinenumber(): ?int
    {
        return $this->orderlinenumber;
    }

    public function setOrderLineNumber(int $orderlinenumber): self
    {
        $this->orderlinenumber = $orderlinenumber;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrdernumber(): Collection
    {
        return $this->ordernumber;
    }

    public function addOrdernumber(Orders $ordernumber): self
    {
        if (!$this->ordernumber->contains($ordernumber)) {
            $this->ordernumber[] = $ordernumber;
        }

        return $this;
    }

    public function removeordernumber(Orders $ordernumber): self
    {
        $this->orderNumber->removeElement($ordernumber);

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProductcode(): Collection
    {
        return $this->productcode;
    }

    public function addProductCode(Products $productcode): self
    {
        if (!$this->productcode->contains($productcode)) {
            $this->productcode[] = $productcode;
        }

        return $this;
    }

    public function removeProductcode(Products $productcode): self
    {
        $this->productcode->removeElement($productcode);

        return $this;
    }

    public function setOrdernumber(?Orders $ordernumber): self
    {
        $this->ordernumber = $ordernumber;

        return $this;
    }

    public function setProductcode(?Products $productcode): self
    {
        $this->productcode = $productcode;

        return $this;
    }
}