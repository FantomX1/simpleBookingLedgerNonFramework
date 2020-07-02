<?php

namespace models\entity;


USE Doctrine\ORM\Mapping AS ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="Account")
 * Class Loan
 */
class Account
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @var
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @ORM\Version
     */
    protected $createdTs;

    /**
     * @ORM\Column(type="text", length=255)
     * @var
     */
    protected $clientName;


    /**
     * @ORM\Column(type="float")
     * @var
     */
    protected $initialAmount;

    /**
     * @ORM\OneToMany(targetEntity="Transaction",  mappedBy="loanId")
     * @var
     */
    protected $transactions;


    public function __construct()
    {

        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**$bug = new Bug();
    $bug->setDescription("Something does not work!");
    $bug->setCreated(new DateTime("now"));
    $bug->setStatus("OPEN")
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getCreatedTs()
    {
        return $this->createdTs;
    }

    /**
     * @param mixed $createdTs
     * @return Account
     */
    public function setCreatedTs($createdTs)
    {
        $this->createdTs = $createdTs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @param mixed $clientName
     * @return Account
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitialAmount()
    {
        return $this->initialAmount;
    }

    /**
     * @param mixed $initialAmount
     * @return Account
     */
    public function setInitialAmount($initialAmount)
    {
        $this->initialAmount = $initialAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     * @return Account
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }


    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[] = $transaction;
    }




}
