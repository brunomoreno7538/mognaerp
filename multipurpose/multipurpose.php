<?php

if(!defined('_PS_VERSION_')){
    exit;
}

class Multipurpose extends Module{

    public function __construct()
    {
        $this->name = 'multipurpose';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Bruno Moreno';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install(){
        return parent::install()
        && $this->registerHook('displayHome')
        && $this->createTabLink();
        ;
    }

    public function uninstall(){
        return parent::uninstall();
    }

    public function hookDisplayHome(){
        $this->context->smarty->assign(array(
            'novoValor' => Configuration::get('novoValor')
        ));
        return $this->display(__FILE__, 'views/templates/hook/home.tpl');
    }

    public function hookHeader(){
        $this->context->controller->addCSS(array(
            $this->_path.'views/css/multipurpose.css'
        ));
        $this->context->controller->addJS(array(
            $this->_path.'views/css/multipurpose.js'
        ));
    }

    public function getContent(){
        if(Tools::isSubmit(textoenviado)){
            $texto = Tools::getValue('texto');
            Configuration::updateValue('novoValor', $texto);
        }
        $this->context->smarty->assign(array(
            'novoValor' => Configuration::get('novoValor')
        ));
        return $this->display(__FILE__, 'views/templates/admin/config.tpl');
    }

    public function createTabLink(){
        $tab = new Tab();
        foreach(Language::getLanguages() as $lang){
            $tab->name[$lang['id_lang']] = $this->l('Origin');
        }
        $tab->class_name = 'AdminOrigin';
        $tab->module = $this->name;
        $tab->parent_id = 0;
        $tab->add();
        return true;
    }

}


