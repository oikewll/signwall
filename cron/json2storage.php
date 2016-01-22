<?php
	$name = 'data-'.$_GET['signid'].'.json';
	$s2 = new SaeStorage();
	$static_data = file_get_contents("http://fotoline.sinaapp.com/signwall/memdata.php?type=get&signid=".$_GET['signid']);//获取json数据

	$s2->write('databakup', $name, $static_data);

	exit("json2storage success!");
?>