<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install.php 8889 2010-04-23 07:48:22Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS beep;
CREATE TABLE beep (
  `uid` mediumint(8) unsigned NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '1',
  `limited` tinyint(1) NOT NULL DEFAULT '1',
  `frequency` int(10) NOT NULL DEFAULT '3',
  `sound` varchar(255) NOT NULL DEFAULT 'mailing',
  PRIMARY KEY (`uid`)
) TYPE=MyISAM;

EOF;

runquery($sql);

$finish = TRUE;

?>