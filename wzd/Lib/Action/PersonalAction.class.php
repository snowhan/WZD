<?php
class PersonalAction extends CommonAction{
	protected function _initialize(){		
		parent::_initialize();		
		$this->checkLogin();
	}		
}