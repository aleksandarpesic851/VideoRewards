<?php

	/*!
	* VIDEO REWARDS v2.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/

class News extends db_connect
{

    public function __construct($dbo = NULL)
    {
        parent::__construct($dbo);

    }

    public function getSingleOffer($id)
    {
        $result = array("error" => true,
                        "error_code" => ERROR_ACCOUNT_ID);

        $stmt = $this->db->prepare("SELECT * FROM news_list WHERE id = (:id) LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch();
                $status = "Active";
                
                $hostName = $_SERVER['HTTP_HOST']; 
                $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

                $result = array("news_id" => $row['id'],
                                "news_title" => $row['title'],
                                "news_image" => $protocol . '://'. $hostName . '/uploads/news/' . $row['image'],
                                "news_amount" => $row['points'],
                                "news_content" => $row['content'],
                                "news_amount_premium" => $row['points_premium'],
                                "news_status" => $status);
            }
        }

        return $result;
    }

    public function getAllNews($requestId = 0)
    {
    
        $requests = array("error" => false, "error_code" => ERROR_SUCCESS, "news" => array());

        $stmt = $this->db->prepare("SELECT id FROM news_list ORDER BY id ASC");
        $stmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);

        if ($stmt->execute()) {

            while ($row = $stmt->fetch()) {

                $requestInfo = $this->getSingleOffer($row['id']);

                array_push($requests['news'], $requestInfo);

                unset($requestInfo);
            }
        }

        return $requests;
    }

    public function getStatus($newsid,$user)
    {
        
        $result = array("error" => true,
                        "error_code" => ERROR_ACCOUNT_ID);

        $stmt = $this->db->prepare("SELECT * FROM news_status WHERE username = '$user' AND newsid = '$newsid' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch();
                
                $result = array("id" => $row['id'],
                                "user" => $row['username'],
                                "news_id" => $row['newsid'],
                                "points" => $row['points'],
                                "date" => $row['date'],
                                "status" => $row['status']);
        }
        
        return $result;
    }
    
}
