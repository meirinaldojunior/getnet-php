<?php

namespace Getnet\API;

/**
 * Class Cofre
 *
 * @package Getnet\API
 */
class Cofre
{

    private $number_token;
    private $customer_id;
    private $cardholder_name;
    private $expiration_month;
    private $expiration_year;
    private $cardholder_identification;
    private $verify_card ;
    private $security_code ;



    /**
     * Get the value of number_token
     */ 
    public function getNumber_token()
    {
        return $this->number_token;
    }

    /**
     * Set the value of number_token
     *
     * @return  self
     */ 
    public function setNumber_token($number_token)
    {
        $this->number_token = $number_token;

        return $this;
    }

    /**
     * Get the value of customer_id
     */ 
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */ 
    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of cardholder_name
     */ 
    public function getCardholder_name()
    {
        return $this->cardholder_name;
    }

    /**
     * Set the value of cardholder_name
     *
     * @return  self
     */ 
    public function setCardholder_name($cardholder_name)
    {
        $this->cardholder_name = $cardholder_name;

        return $this;
    }

    /**
     * Get the value of expiration_month
     */ 
    public function getExpiration_month()
    {
        return $this->expiration_month;
    }

    /**
     * Set the value of expiration_month
     *
     * @return  self
     */ 
    public function setExpiration_month($expiration_month)
    {
        $this->expiration_month = $expiration_month;

        return $this;
    }

    /**
     * Get the value of expiration_year
     */ 
    public function getExpiration_year()
    {
        return $this->expiration_year;
    }

    /**
     * Set the value of expiration_year
     *
     * @return  self
     */ 
    public function setExpiration_year($expiration_year)
    {
        $this->expiration_year = $expiration_year;

        return $this;
    }

    /**
     * Get the value of cardholder_identification
     */ 
    public function getCardholder_identification()
    {
        return $this->cardholder_identification;
    }

    /**
     * Set the value of cardholder_identification
     *
     * @return  self
     */ 
    public function setCardholder_identification($cardholder_identification)
    {
        $this->cardholder_identification = $cardholder_identification;

        return $this;
    }

    /**
     * Get the value of verify_card
     */ 
    public function getVerify_card()
    {
        return $this->verify_card;
    }

    /**
     * Set the value of verify_card
     *
     * @return  self
     */ 
    public function setVerify_card($verify_card)
    {
        $this->verify_card = $verify_card;

        return $this;
    }

    /**
     * Get the value of security_code
     */ 
    public function getSecurity_code()
    {
        return $this->security_code;
    }

    /**
     * Set the value of security_code
     *
     * @return  self
     */ 
    public function setSecurity_code($security_code)
    {
        $this->security_code = $security_code;

        return $this;
    }
}
