<?php

require_once 'ConnectMySql.php';
class NMarketController
{
    private $hubSkuUrl;
    private $hubStockUrl;

    public function __construct()
    {
        $this->hubSkuUrl = 'http://127.0.0.1:8000/api/hubsku/';
        $this->hubStockUrl = 'http://127.0.0.1:8000/api/hubstock/';
    }

    public function consumeApi($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch), true);
        return $resultado;
    }

    public function dataSkuStock(){
        $data = array();
        $finalData = array();
        $skuData = $this->consumeApi($this->hubStockUrl);
        $stockData = $this->consumeApi($this->hubSkuUrl);
        for($i = 0; $i < count($skuData); $i ++){
            $data[$i] = array_merge($skuData[$i], $stockData[$i]);
            $finalData[$i] = [
                "sku" => $data[$i]['sku'],
                "ean" => $data[$i]['ean'],
                "name" => $data[$i]['title'],
                "stock" => $data[$i]['quantity'],
                "price" => $data[$i]['sellPrice'],
                "brand" => '---',
                "description" => '---',
                "available" => 2,
                "fabrica" => 'LojaDOIS'
            ];
        }
        return $finalData;
    }

    public function storeApiData(){
        $mysql = new ConnectMySql($this->dataSkuStock());
        $mysql->storeData();
    }

    public function updateStoreApiData(){
        if(isset($_POST['fetchApi'])){
            $mysql = new ConnectMySql($this->dataSkuStock());
            $mysql->updateDbData();
        }
    }

    public function updateOneData()
    {
        if (isset($_POST['saveData'])) {
            $mysql = new ConnectMySql($this->dataSkuStock());
            $mysql->updateOneRow($_POST);
            $putSku = [
                "sku" => ($_POST['sku']),
                "ean" => ($_POST['ean']),
                "title" => ($_POST['name']),
                "sellPrice" => ($_POST['price']),
            ];
            $putStock = [
                "stock" => ($_POST['stock'])
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->hubSkuUrl . $_POST['sku']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($putSku));
            $responseSku = curl_exec($ch);
            return $responseSku;
        }
    }

}