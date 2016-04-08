<?php

// src/Acme/StoreBundle/Document/Product.php
namespace Acme\StoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
    *  * @MongoDB\Document
    *   */
class Product
{
    /**
    * @MongoDB\Id
    */
    protected $id;

    /**
    * @MongoDB\String
    */
    protected $name;

    /**
    * @MongoDB\Float
    */
    protected $price;

    /**
    * @MongoDB\Int
    */
    protected $did;

    /**
    * @MongoDB\String
    */
    protected $comments;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }




    /**
     * Set did
     *
     * @param int $did
     * @return self
     */
    public function setDid($did)
    {
        $this->did = $did;
        return $this;
    }

    /**
     * Get did
     *
     * @return int $did
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Get comments
     *
     * @return string $comments
     */
    public function getComments()
    {
        return $this->comments;
    }
}
