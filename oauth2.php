<?php

	$appid = "APPID";
	$appsecret = "APPSECTET";
	
	$code = $_GET['code'];//前端传来的code值
	
	//获取access_token,openid
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
	$result = https_request($url);
	$jsoninfo = json_decode($result, true);

	$openid = $jsoninfo["openid"];//从返回json结果中读出openid
	$access_token = $jsoninfo["access_token"];//从返回json结果中读出access_token

	// $callback=$_GET['callback'];  // 给前端构造jsonp;

	$url1 = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
	$result1 = https_request($url1);
	$jsoninfo1 = json_decode($result1, true);

	echo $result1;

	function https_request($url,$data = null){
		$curl = curl_init();   
		curl_setopt($curl, CURLOPT_URL, $url);   
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);   
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);    
		if (!empty($data)){    
		curl_setopt($curl, CURLOPT_POST, 1);  
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);   
		}    
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($curl);    
		curl_close($curl);    
		return $output;
	}
?>