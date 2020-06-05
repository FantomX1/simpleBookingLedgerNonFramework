<?php

USE Doctrine\ORM\Mapping AS ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Loan")
 * Class Loan
 */
class Loan
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
