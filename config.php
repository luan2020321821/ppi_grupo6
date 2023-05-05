<?php

define('BD_USER', 'root');
define('BD_PASS', 'usbw');
define('BD_NAME', 'progweb');

mysql_connect('localhost', BD_USER, BD_PASS);
mysql_SELECT_DB(BD_NAME);

?>