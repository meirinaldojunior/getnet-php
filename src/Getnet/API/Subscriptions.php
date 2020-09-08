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

    $this->setSubscriptionId($response['subscription']['subscription_id']);
    $this->setStatusDetails($response['status_details']);
    $this->setPayment($response['payment']);

    return $this;
  }

  /**
   * 
   * Alterar valor da assinatura
   * 
   */
  public function addAmountSubscription(Getnet $credencial, $idSubscription, $data)
  {
    $request = new Request($credencial);
    $response = $request->post($credencial, "/v1/subscriptions/$idSubscription/floating", json_encode([$data]));
    return $response;
  }

  /**
   * 
   * Alterar valor da assinatura
   * 
   */
  public function changeAmountSubscription(Getnet $credencial, $idSubscription, $data)
  {
    $request = new Request($credencial);
    $response = $request->patch($credencial, "/v1/subscriptions/$idSubscription/floating", json_encode([$data]));
    return $response;
  }

  /**
   * 
   * Alterar valor da assinatura
   * 
   */
  public function removeAllFloating(Getnet $credencial, $idSubscription)
  {
    $request = new Request($credencial);
    $response = $request->delete($credencial, "/v1/subscriptions/$idSubscription/floating");
    return $response;
  }

  /**
   * 
   * Alterar dia da assinatura
   * 
   */
  public function changeDaySubscription(Getnet $credencial, $idSubscription, $data)
  {
    $request = new Request($credencial);
    $response = $request->patch($credencial, "/v1/subscriptions/$idSubscription/paymentDate", json_encode($data));
    return $response;
  }


  /**
   * 
   * Alterar valor da assinatura
   * 
   */
  public function getSubscription(Getnet $credencial, $idSubscription)
  {
    $request = new Request($credencial);
    $response = $request->get($credencial, "/v1/subscriptions/$idSubscription");

    return $response;
  }

  /**
   * 
   * Listar ultimas 6 assinaturas
   * 
   */
  public function getSubscriptions(Getnet $credencial, $query)
  {
    $q = http_build_query($query);
    $request = new Request($credencial);
    $response = $request->get($credencial, "/v1/charges?$q");

    return $response;
  }
}
