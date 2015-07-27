<?php

namespace Gini\Controller\CGI;

class Maintain extends \Gini\Controller\CGI
{
    public function __index()
    {
    	//获取系统维护模块的状态信息
        $config = \Gini\Config::get('maintenance.default');

        if ($config['status'] && $config['status'] == 'on') {
        	//维护模块开启时跳转到维护页面
    		return \Gini\IoC::construct('\Gini\CGI\Response\HTML', V('maintenance', array('maintain_end_date' => $config['maintain_end_date'])));
        } else {
        	//维护模块关闭时跳转到首页
        	return $this->redirect('/');
    	}
    }
}