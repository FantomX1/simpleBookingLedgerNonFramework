<?php

namespace models\entity;

USE Doctrine\ORM\Mapping AS ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Transaction")

 */
class Transaction
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @var
     */
    protected $id;


    /**
     * tinyint maybe more efficient for change 1,2 but less descriptive
     * @ORM\Column(type="string", columnDefinition="ENUM('C', 'D')")
     * @var
     */
    protected $cd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="float")
     * @var
     */
    protected $credit;

    /**
     * @ORM\Column(type="float")
     * @var
     */
    protected $debit;

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="transactions")
     * @var
     */
    protected $loanId;

    /**
     * @ORM\Column(type="string")
     * @var
     */
    protected $who;

    /**
     * @ORM\Column(type="date")
     * @var
     */
    protected $bookingDate;

    /**
     * @ORM\Column(type="date")
     * @var
     */
    protected $paymentDate;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @ORM\Version
     */
    protected $ts;

    /**
     * @ORM\Column(type="text", length=255)
     * @var
     */
    protected $text;



    /**
     * @return mixed
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * @param mixed $cd
     * @return Transaction
     */
    public function setCd($cd)
    {
        $this->cd = $cd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param mixed $credit
     * @return Transaction
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * @param mixed $debit
     * @return Transaction
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoanId()
    {
        return $this->loanId;
    }

    /**
     * @param mixed $loanId
     * @return Transaction
     */
    public function setLoanId(Account $loanId)
    {
        $loanId->addTransaction($this);
        $this->loanId = $loanId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * @param mixed $who
     * @return Transaction
     */
    public function setWho($who)
    {
        $this->who = $who;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @param mixed $bookingDate
     * @return Transaction
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param mixed $paymentDate
     * @return Transaction
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * @param mixed $ts
     * @return Transaction
     */
    public function setTs($ts)
    {
        $this->ts = $ts;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return Transaction
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }




}
