<?php

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


    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[] = $transaction;
    }




}
