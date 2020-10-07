<?php

require_once 'ConnectMySql.php';
require_once 'NMarketController.php';
class MognaErpController
{
    private $url;

    public function __construct()
    {
        $this->url = 'http://127.0.0.1:8000/api/products/';
    }

    public function consumeApi(){
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch), true);
        return $resultado;
    }

    public function storeData(){
        $mysql = new ConnectMySql($this->consumeApi());
        $mysql->storeData();
    }

    public function updateStoreData(){
        if(isset($_POST['fetchApi'])){
        $mysql = new ConnectMySql($this->consumeApi());
        $mysql->updateDbData();
        }
    }

    public function updateOneData(){
        if(isset($_POST['saveData'])){
        $mysql = new ConnectMySql($this->consumeApi());
        $mysql->updateOneRow($_POST);
        $post = [
            "sku" => ($_POST['sku']),
            "ean" => ($_POST['ean']),
            "name" => ($_POST['name']),
            "stock" => ($_POST['stock']),
            "price" => ($_POST['price']),
            "brand" => ($_POST['brand']),
            "description" => ($_POST['description']),
            "available" => ($_POST['available'])
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . "0");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        return $response;
        }
    }

    public function indexData(){
        $mysql = new ConnectMySql($this->consumeApi());
        return $mysql->selectDbData();
    }

}