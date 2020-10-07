<?php
require_once 'ConnectMySql.php';
require_once 'MognaErpController.php';
require_once 'NMarketController.php';
class AdminOriginController extends ModuleAdminController{
    public function __construct(){
        parent::__construct();
    }

    public function init(){
        parent::init();
        $this->bootstrap = true;
    }

    public function initContent(){
        $data = new MognaErpController();
        $data->consumeApi();
        $data->storeData();
        $data->updateStoreData();
        $data->indexData();
        parent::initContent();
        $this->context->smarty->assign(array(
            'products' => $data->indexData()
        ));
        $this->setTemplate('origin.tpl');
    }
}