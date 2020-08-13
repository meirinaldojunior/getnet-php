<?php

namespace Getnet\API;

/**
 * Class Customer
 *
 * @package Getnet\API
 */
class Customer implements \JsonSerializable
{

    const DOCUMENT_TYPE_CPF  = "CPF";
    const DOCUMENT_TYPE_CNPJ = "CNPJ";

    private $customer_id;

    private $first_name;

    private $last_name;

    private $name;

    private $email;

    private $document_type;

    private $document_number;

    private $phone_number;

    private $billing_address;

    public function __construct($customer_id = null)
    {
        $this->setCustomerId($customer_id);
    }

    /**
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return $vars_clear;
    }

    /**
     *
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     *
     * @param mixed $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = (string)$customer_id;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     *
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = (string)$first_name;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     *
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = (string)$last_name;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->document_type;
    }

    /**
     *
     * @param mixed $document_type
     */
    public function setDocumentType($document_type)
    {
        $this->document_type = (string)$document_type;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->document_number;
    }

    /**
     *
     * @param mixed $document_number
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = (string)$document_number;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     *
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = (string)$phone_number;

        return $this;
    }

    /**
     *
     * @return Address
     */
    public function billingAddress()
    {
        $address = new Address();

        $this->setBillingAddress($address);

        return $address;
    }

    /**
     *
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     *
     * @param mixed $billing_address
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;

        return $this;
    }

    /**
     * 
     * Cria um novo cliente
     * 
     */
    public function newCustomer(Getnet $credencial, $customer)
    {
        $request = new Request($credencial);
        $response = $request->post($credencial, "/v1/customers", json_encode($customer));

        $this->customer_id = $response['customers'][0]['customer_id'];
        $this->first_name = $response['customers'][0]['first_name'];
        $this->last_name = $response['customers'][0]['last_name'];
        $this->document_type = $response['customers'][0]['document_type'];
        $this->document_number = $response['customers'][0]['document_number'];
        $this->phone_number = $response['customers'][0]['phone_number'];
        $this->celphone_number = $response['customers'][0]['celphone_number'];
        $this->email = $response['customers'][0]['email'];
        $this->status = $response['customers'][0]['status'];
        dd($this);
        return $this;
    }

    /**
     * 
     * Lista clientes
     * 
     */
    public function getCustomer(Getnet $credencial, $cpf)
    {
        $request = new Request($credencial);
        $response = $request->get($credencial, "/v1/customers?page=1&limit=10&document_number=$cpf");

        if (!empty($response)) {
            $this->customer_id = $response['customers'][0]['customer_id'];
            $this->first_name = $response['customers'][0]['first_name'];
            $this->last_name = $response['customers'][0]['last_name'];
            $this->document_type = $response['customers'][0]['document_type'];
            $this->document_number = $response['customers'][0]['document_number'];
            $this->phone_number = $response['customers'][0]['phone_number'];
            $this->celphone_number = $response['customers'][0]['celphone_number'];
            $this->email = $response['customers'][0]['email'];
            $this->status = $response['customers'][0]['status'];
            return $this;
        } else {
            return null;
        }
    }
}
