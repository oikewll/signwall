<?php
	if(isset($_FILES["userAvatar"])){

		$files = $_FILES['userAvatar'];
		$name = 'avatar-'.time().'.jpg';
		$form_data =$files['tmp_name'];
		$s2 = new SaeStorage();
		$img = new SaeImage();
		$img_data = file_get_contents($form_data);//获取本地上传的图片数据
		$img->setData($img_data);
		$img->resize(260,260); //图片缩放
		$img->improve();//提高图片质量的函数
		$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
		$s2->write('upload',$name,$new_data);//将upload修改为自己的storage
		$url= $s2->getUrl('upload',$name);

		exit("{'state':'200','headimgurl':'".$url."'}");
	}
?>