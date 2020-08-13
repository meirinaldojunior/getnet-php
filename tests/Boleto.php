<?php
use Getnet\API\Getnet;
use Getnet\API\Transaction;
use Getnet\API\Environment;
use Getnet\API\Customer;
use Getnet\API\Boleto;
use Getnet\API\Order;


session_start();
include "../vendor/autoload.php";


$client_id      = "3a666a8c-6d97-4eb0-a62c-77e3758c3425";
$client_secret  = "f52a2358-70e6-4baa-b77f-9f0eeb7c8706";
$seller_id      = "c695b415-6f2e-4475-a221-3c005258a450";
$environment    = Environment::sandbox();

//Opicional, passar chave se você quiser guardar o token do auth na sessão para não precisar buscar a cada trasação, só quando expira
$keySession = null;

//Autenticação da API
$getnet = new Getnet($client_id, $client_secret, $environment, $keySession);

//Cria a transação
$transaction = new Transaction();
$transaction->setSellerId($seller_id);
$transaction->setCurrency("BRL");
$transaction->setAmount(75.50);

//Adicionar dados do Pedido
$transaction->order("123456")
->setProductType(Order::PRODUCT_TYPE_SERVICE)
->setSalesTax(0);

$transaction->boleto("000001946598")
            ->setDocumentNumber("170500000019763")
            ->setExpirationDate("21/11/2018")
            ->setProvider(Boleto::PROVIDER_SANTANDER)
            ->setInstructions("Não receber após o vencimento");

//Adicionar dados do cliente
$transaction->customer("customer_210818263")
    ->setDocumentType(Customer::DOCUMENT_TYPE_CPF)
    ->setEmail("customer@email.com.br")
    ->setFirstName("Jax")
    ->setLastName("Teller")
    ->setName("Jax Teller")
    ->setPhoneNumber("5551999887766")
    ->setDocumentNumber("12345678912")
    ->billingAddress()
        ->setCity("São Paulo")
        ->setComplement("Sons of Anarchy")
        ->setCountry("Brasil")
        ->setDistrict("Centro")
        ->setNumber("1000")
        ->setPostalCode("90230060")
        ->setState("SP")
        ->setStreet("Av. Brasil");

$response = $getnet->boleto($transaction);

print_r($response->getStatus()."\n");
print_r($response->getBoletoHtml()."\n");

