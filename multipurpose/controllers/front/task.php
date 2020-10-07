<?php
class MultipurposeTaskModuleFrontController extends ModuleFrontController{

    public function __construct(){
        parent::__construct();
    }

    public function init(){
        parent::init();
    }

    public function initContent(){
        parent::initContent();
        $this->context->smarty->assign(array(
            'nb_product' => Db::getInstance()->getValue('select count(*) from prestashop.p_product'),
            'products_name' => Db::getInstance()->executeS('select name from prestashop.p_product_lang')
        ));
        $this->setTemplate('module:multipurpose/views/templates/front/task.tpl');
    }
    
}