<?php

namespace Getnet\API;

/**
 * Class Cofre
 *
 * @package Getnet\API
 */
class Cofre implements \JsonSerializable
{

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
   * 
   * Criar cartão no cofre
   * 
   */
  public function addCardCofre(Getnet $credencial, $data)
  {
    $request = new Request($credencial);
    $response = $request->post($credencial, "/v1/cards", json_encode($data));
    return $response;
  }

  /**
   * 
   * get cartão do cofre
   * 
   */
  public function getCardCofre(Getnet $credencial, $data)
  {
    $request = new Request($credencial);
    $response = $request->get($credencial, "/v1/cards/$data");
    return $response;
  }
}
