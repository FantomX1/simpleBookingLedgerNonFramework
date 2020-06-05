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


//    /**
//     * @TODO
//     * @ORM\OneToMany
//     * @var
//     */
//    protected $addedTransaction;
//
//    public function __construct()
//    {
//
//        $this->addedTransaction = new \Doctrine\Common\Collections\ArrayCollection();
//
//    }


}
