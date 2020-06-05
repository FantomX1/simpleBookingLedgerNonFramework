<?php

USE Doctrine\ORM\Mapping AS ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Transaction")
 * Class Loan
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
     * @ORM\Column(type="datetime")
     * @var
     */
    protected $ts;

    /**
     * @ORM\Column(type="text", length=255)
     * @var
     */
    protected $text;

}
