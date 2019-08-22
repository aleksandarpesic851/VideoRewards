<?php

	/*!
	* VIDEO REWARDS v2.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/

class rewardedVideos extends db_connect
{

    public function __construct($dbo = NULL)
    {
        parent::__construct($dbo);

    }

    public function getSingleOffer($id)
    {
        $result = array("error" => true,
                        "error_code" => ERROR_ACCOUNT_ID);

        $stmt = $this->db->prepare("SELECT * FROM videos_list WHERE id = (:id) LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch();
                
                $status = "Active";
                
                $hostName = $_SERVER['HTTP_HOST']; 
                $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

                $result = array("video_id" => $row['id'],
                                "video_title" => $row['title'],
                                "video_subtitle" => $row['sub'],
                                "video_url" => $protocol . '://'. $hostName . '/uploads/videos/videos/' . $row['video'],
                                "video_amount" => $row['points'],
                                "video_duration" => $row['time'],
                                "video_thumbnail" => $row['thumb'],
                                // "video_open_link" => $row['open_link'],
                                "video_status" => $status,
                                "video_amount_premium" => $row['points_premium']);
            }
        }

        return $result;
    }

    public function getAllVideos($requestId = 0)
    {
    
        $requests = array("error" => false, "error_code" => ERROR_SUCCESS, "videos" => array());

        $stmt = $this->db->prepare("SELECT id FROM videos_list ORDER BY id ASC");
        $stmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);

        if ($stmt->execute()) {

            while ($row = $stmt->fetch()) {

                $requestInfo = $this->getSingleOffer($row['id']);

                array_push($requests['videos'], $requestInfo);

                unset($requestInfo);
            }
        }

        return $requests;
    }

    public function getStatus($videoid,$user)
    {
        
        $result = array("error" => true,
                        "error_code" => ERROR_ACCOUNT_ID);

        $stmt = $this->db->prepare("SELECT * FROM video_status WHERE username = '$user' AND videoid = '$videoid' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch();
                
                $result = array("id" => $row['id'],
                                "user" => $row['username'],
                                "video_id" => $row['videoid'],
                                "points" => $row['points'],
                                "date" => $row['date'],
                                "status" => $row['status']);
        }
        
        return $result;
    }
    
}
