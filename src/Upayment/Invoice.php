<?php

namespace Upayment;

class Invoice
{

    /**
     * @var mixed
     */
    private $billId;

    /**
     * @var mixed
     */
    private $identifier;

    /**
     * @var mixed
     */
    private $amount;

    /**
     * @var mixed
     */
    private $receiptient;

    /**
     * @var mixed
     */
    private $email;

    /**
     * @var mixed
     */
    private $description;

    /**
     * @param $amount
     * @param $receiptient
     * @param $description
     */
    public function __construct($amount, $receiptient, $description, $email = null)
    {
        $this->amount = $amount;
        $this->receiptient = $receiptient;
        $this->description = $description;
        $this->email = $email;
    }

    /**
     * @param $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     */
    public function setBillId($billId)
    {
        $this->billId = $billId;
    }

    /**
     * @return mixed
     */
    public function getBillId()
    {
        return $this->billId;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @param $receiptient
     */
    public function setReceiptient($receiptient)
    {
        $this->receiptient = $receiptient;
    }

    /**
     * @return mixed
     */
    public function receiptient()
    {
        return $this->receiptient;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }

    public function __toString()
    {
        return __class__;
    }

}
