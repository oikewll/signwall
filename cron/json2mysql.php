<?php
/*
 * SAE_MYSQL_USER: 用户名 
 * SAE_MYSQL_PASS：密码： 
 * SAE_MYSQL_HOST_M：主库域名
 * SAE_MYSQL_HOST_S：从库域名 
 * SAE_MYSQL_PORT：端口： 
 * SAE_MYSQL_DB数据库名
 * 
 * 详细说明：页面的编码要和数据库的编码一样，不然会出现乱码
 * 或者在连接数据库时设置mysql_set_charset()
 * 
 */
$link = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS); //官方提供的常量
if ($link) {
	mysql_select_db(SAE_MYSQL_DB, $link);
	mysql_set_charset("gbk");
	// .........
} else {
	echo "数据库连接成功";
}
?>