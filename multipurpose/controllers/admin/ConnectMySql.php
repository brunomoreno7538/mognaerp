<?php
require_once 'MognaErpController.php';
class ConnectMySql{
    private $apiData;
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'sasasa123';
    private $db_name = 'api_hub';

    public function __construct($apiData)
    {
        $this->apiData = $apiData;
    }

    public function storeData(){
        $connect = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if($connect->connect_error){
            die('Connection failed: ' . $connect->connect_error);
        }
        foreach ($this->apiData as $data){  
            $sql = "INSERT INTO productapis (sku, ean, `name`, quantity, price, `description`, available_for_order,  `reference`, friendly_url, upc, `active`, visibility, `condition`, show_price, available_online_only, short_description, wholesale_price, unit_price, special_price, special_price_start_date, special_price_end_date, on_sale, meta_title, meta_description, image_url, out_of_stock, minimal_quantity, product_available_date, text_when_stock, text_when_backorder_allowed, category, default_category_id, width, height, depth, weight, additional_shipping)
              VALUES('".$data["sku"]."', '".$data["ean"]."', '".$data["name"]."', '".$data["quantity"]."', '".$data["price"]."',
                 '".$data["description"]."', '".$data["available_for_order"]."', '".$data["reference"]."' , '".$data["friendly_url"]."', '".$data["upc"]."',
                 '".$data["active"]."', '".$data["visibility"]."', '".$data["condition"]."', '".$data["show_price"]."', '".$data["available_online_only"]."', 
                '".$data["short_description"]."', '".$data["wholesale_price"]."', '".$data["unit_price"]."', '".$data["special_price"]."', '".$data["special_price_start_date"]."', '".$data["special_price_end_date"]."', 
                '".$data["on_sale"]."', '".$data["meta_title"]."', '".$data["meta_description"]."', '".$data["image_url"]."', '".$data["out_of_stock"]."', '".$data["minimal_quantity"]."',
                '".$data["product_available_date"]."', '".$data["text_when_stock"]."', '".$data["text_when_backorder_allowed"]."', '".$data["category"]."', '".$data["default_category_id"]."', '".$data["width"]."', '".$data["height"]."',
                '".$data["depth"]."', '".$data["weight"]."', '".$data["additional_shipping"]."')";
            $connect->query($sql);
        }
        $connect->close();
    }

    public function selectDbData(){
        $data = array();
        $connect = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if($connect->connect_error){
            die('Connection failed: ' . $connect->connect_error);
        }
        $sql = "SELECT id, sku, ean, name, quantity, price, description, available_for_order from productapis";
        $results = $connect->query($sql);
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        return 1;
    }


    public function updateDbData(){
        $connect = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if($connect->connect_error){
            die('Connection failed: ' . $connect->connect_error);
        }
        foreach ($this->apiData as $data){
            $sql = "UPDATE productapis SET `name`='".$data["name"]."' , `reference`='".$data["reference"]."', price='".$data["price"]."', 
            friendly_url= '".$data["friendly_url"]."', ean='".$data["ean"]."', upc='".$data["upc"]."', 
            `active`='".$data["active"]."', visibility='".$data["visibility"]."' , `condition`='".$data["condition"]."' , available_for_order='".$data["available_for_order"]."', show_price='".$data["show_price"]."',
             available_for_order='".$data["available_for_order"]."', available_online_only='".$data["available_online_only"]."', short_description='".$data["short_description"]."', wholesale_price='".$data["wholesale_price"]."', 
             unit_price='".$data["unit_price"]."', special_price='".$data["special_price"]."', special_price_start_date='".$data["special_price_start_date"]."', 
             special_price_end_date='".$data["special_price_end_date"]."', on_sale='".$data["on_sale"]."', meta_title='".$data["meta_title"]."', meta_description='".$data["meta_description"]."', 
             image_url='".$data["image_url"]."', quantity='".$data["quantity"]."', out_of_stock='".$data["out_of_stock"]."', minimal_quantity='".$data["minimal_quantity"]."', product_available_date='".$data["product_available_date"]."', 
             text_when_stock='".$data["text_when_stock"]."', text_when_backorder_allowed='".$data["text_when_backorder_allowed"]."', category='".$data["category"]."', 
             default_category_id='".$data["default_category_id"]."', width='".$data["width"]."', height='".$data["height"]."', depth='".$data["depth"]."', weight='".$data["weight"]."', additional_shipping='".$data["additional_shipping"]."' WHERE sku='".$data["sku"]."'";
            var_dump($connect->error);
            $connect->query($sql);
        }
        $connect->close();
    }

    public function updateOneRow($data){
        $connect = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if($connect->connect_error){
            die('Connection failed: ' . $connect->connect_error);
        }
        $sql = "UPDATE productapis SET `name`='".$data["name"]."' , `reference`='".$data["reference"]."', price='".$data["price"]."', 
            friendly_url= '".$data["friendly_url"]."', ean='".$data["ean"]."', upc='".$data["upc"]."', 
            `active`='".$data["active"]."', visibility='".$data["visibility"]."' , `condition`='".$data["condition"]."' , available_for_order='".$data["available_for_order"]."', show_price='".$data["show_price"]."',
             available_for_order='".$data["available_for_order"]."', available_online_only='".$data["available_online_only"]."', short_description='".$data["short_description"]."', wholesale_price='".$data["wholesale_price"]."', 
             unit_price='".$data["unit_price"]."', special_price='".$data["special_price"]."', special_price_start_date='".$data["special_price_start_date"]."', 
             special_price_end_date='".$data["special_price_end_date"]."', on_sale='".$data["on_sale"]."', meta_title='".$data["meta_title"]."', meta_description='".$data["meta_description"]."', 
             image_url='".$data["image_url"]."', quantity='".$data["quantity"]."', out_of_stock='".$data["out_of_stock"]."', minimal_quantity='".$data["minimal_quantity"]."', product_available_date='".$data["product_available_date"]."', 
             text_when_stock='".$data["text_when_stock"]."', text_when_backorder_allowed='".$data["text_when_backorder_allowed"]."', category='".$data["category"]."', 
             default_category_id='".$data["default_category_id"]."', width='".$data["width"]."', height='".$data["height"]."', depth='".$data["depth"]."', weight='".$data["weight"]."', additional_shipping='".$data["additional_shipping"]."' WHERE sku='".$data["sku"]."'";
            $connect->query($sql);
            $connect->close();
    }
}