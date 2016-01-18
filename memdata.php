<?php
//定义服务器时间
date_default_timezone_set("PRC");
$time = date("H:i:s");

// 创建 memcached 对象实例
$mc = new Memcache;
$ret = $mc->connect(); 

// id作为每一场的唯一标识,没有则写到全局
if ($_GET['signid']) {
	$key = $_GET['signid'];
}else{
	$key = "signall";
}

if ($_GET['type'] == 'set') {
	if ($mc->get($key)) {
		$signarr = $mc->get($key);
	}else{
		$signarr = array();
	}

	// option
	$headimgurl = $_GET['headimgurl'];
	$nickname = $_GET['nickname'];
	$title = $_GET['title'];
	$sex = $_GET['sex'];
	$openid = $_GET['openid'];
	$country = $_GET['country'];
	$province = $_GET['province'];
	$city = $_GET['city'];
	$talks = $_GET['talks'];

	$option = array(
		'headimgurl' => $headimgurl, //头像地址
		'nickname' => $nickname,
		'title' => $title,  
		'sex' => $sex,
		'openid' => $openid,
		'country' => $country,
		'province' => $province,
		'city' => $city,
		'talks' => $talks,
		'time' => $time
	);

	// array_push($signarr, $option);
	array_unshift($signarr, $option);

	// 往 memcached 中写入对象
	$mc->set($key, $signarr);

	echo "success";
}elseif ($_GET['type'] == 'get') {
	header('Content-Type:text/json');
	$val = $mc->get($key);
	exit(json_encode($val));
}

?>
