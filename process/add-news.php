<?php

/*!
 * VIDEO REWARDS v2.0
 *
 * http://www.droidoxy.com
 * support@droidoxy.com
 *
 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
 */

include_once("../core/init.inc.php");

if (admin::isSession() && !empty($_POST) && !APP_DEMO){
	
	//copy video file
	$folder=$_SERVER['DOCUMENT_ROOT'] . "/uploads/news/";
	$news_image = date("Y_m_d_H_i_s_", time()) . $_FILES["news_image"]["name"];
	if (!move_uploaded_file($_FILES["news_image"]["tmp_name"], $folder.$news_image))
	{
		echo $news_image;
		exit();
	}
		
	$news_title = $_POST['news_title'];
	$news_content = $_POST['news_content'];
	$news_points = $_POST['news_points'];
	$news_points_premium = $_POST['news_points_premium'];
	
	$news_title = helper::clearText($news_title);
	$news_title = helper::escapeText($news_title);
	
	$news_content = helper::clearText($news_content);
	$news_content = helper::escapeText($news_content);
	
	$sql = "INSERT INTO news_list (title, image, points, points_premium, content) VALUES ('$news_title','$news_image','$news_points','$news_points_premium','$news_content')";
	$stmt = $dbo->prepare($sql);
	
	if($stmt->execute()){
		
		echo 'ok';
		exit();
	}
	
}

echo 'fail3';
?>