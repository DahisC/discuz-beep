<?php

	// 測試中

	if(!defined('IN_DISCUZ')) {
		exit('Access Denied');
	}

	class table_beep extends discuz_table
	{
		public function __construct() {

			$this->_table = 'beep';
			$this->_pk    = 'uid';

			parent::__construct();
		}
	}

?>