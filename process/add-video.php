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
	$folder=$_SERVER['DOCUMENT_ROOT'] . "/uploads/images/";
	$video_thumb = date("Y_m_d_H_i_s_", time()) . $_FILES["video_file"]["name"][0];
	if (!move_uploaded_file($_FILES["video_file"]["tmp_name"][0], $folder.$video_thumb))
	{
		echo 'fail1';
		exit();
	}
		

	$folder=$_SERVER['DOCUMENT_ROOT'] . "/uploads/videos/";
	$video_file = date("Y_m_d_H_i_s_", time()) . $_FILES["video_file"]["name"][1];
	if (!move_uploaded_file($_FILES["video_file"]["tmp_name"][1], $folder.$video_file))
	{
		echo 'fail2';
		exit();
	}
		

	$video_title = $_POST['video_title'];
	$video_sub = $_POST['video_sub'];
	$video_amount = $_POST['video_amount'];
	$video_dur = $_POST['video_dur'];
	
	$video_title = helper::clearText($video_title);
	$video_title = helper::escapeText($video_title);
	
	$video_sub = helper::clearText($video_sub);
	$video_sub = helper::escapeText($video_sub);
	
	$sql = "INSERT INTO videos_list (title, sub, thumb, points, video, time) VALUES ('$video_title','$video_sub','$video_thumb','$video_amount','$video_file','$video_dur')";
	$stmt = $dbo->prepare($sql);
	
	if($stmt->execute()){
		
		echo 'ok';
		exit();
	}
	
}

echo 'fail3';
?>