<?php

namespace Getnet\API;

/**
 * Class Subscriptions
 *
 * @package Getnet\API
 */
class Subscriptions implements \JsonSerializable
{

  private $subscription_id;
  private $status_details;
  private $payment;

  public function __construct()
  {
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
   * Get the value of subscription_id
   */
  public function getSubscriptionId()
  {
    return $this->subscription_id;
  }

  /**
   * Set the value of subscription_id
   *
   * @return  self
   */
  public function setSubscriptionId($subscription_id)
  {
    $this->subscription_id = $subscription_id;

    return $this;
  }

  /**
   * Get the value of status_details
   */
  public function getStatusDetails()
  {
    return $this->status_details;
  }

  /**
   * Set the value of status_details
   *
   * @return  self
   */
  public function setStatusDetails($status_details)
  {
    $this->status_details = $status_details;

    return $this;
  }

  /**
   * Get the value of payment
   */
  public function getPayment()
  {
    return $this->payment;
  }

  /**
   * Set the value of payment
   *
   * @return  self
   */
  public function setPayment($payment)
  {
    $this->payment = $payment;

    return $this;
  }

  /**
   * 
   * Cria nova assinatura
   * 
   */
  public function newSubscription(Getnet $credencial, $data)
  {
    $request = new Request($credencial);
    $response = $request->post($credencial, "/v1/subscriptions", json_encode($data));

    $this->subscription_id = $response['subscription']['subscription_id'];
    $this->status_details = $response['status_details'];
    $this->payment = $response['payment'];

    return $this;
  }
}
