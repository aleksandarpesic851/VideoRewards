<?php

	/*!
	* VIDEO REWARDS v2.0
	*
	* http://www.droidoxy.com
	* support@droidoxy.com
	*
	* Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	*/

class functions extends db_connect
{
    private $requestFrom = 0;

    public function __construct($dbo = NULL)
    {
        parent::__construct($dbo);

    }

    public function getRequestsCount()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM Requests");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    private function getMaxRequestsId()
    {
        $stmt = $this->db->prepare("SELECT MAX(rid) FROM Requests");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function calcPercent($amount,$type)
    {
		$percent = 0;
		
        if($amount < 100 && $type == "week"){
			
			$percent = $amount/1;
			
		}else if($amount < 200 && $type == "week"){
			
			$percent = $amount/2;
			
		}else if($amount < 500 && $type == "week"){
			
			$percent = $amount/5;
			
		}else if($amount < 800 && $type == "week"){
			
			$percent = $amount/8;
			
		}else if($amount < 1000){
			
			$percent = $amount/10;
			
		}else if($amount < 1500){
			
			$percent = $amount/15;
			
		}else if($amount < 2000){
			
			$percent = $amount/20;
			
		}else if($amount < 3000){
			
			$percent = $amount/30;
			
		}else if($amount < 4000){
			
			$percent = $amount/40;
			
		}else if($amount < 5000){
			
			$percent = $amount/50;
			
		}else if($amount < 7500){
			
			$percent = $amount/75;
			
		}else{
			
			$percent = $amount/100;
			
		}

        return $percent;
    }

    public function getTotalUsers()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM users");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getNewUsers()
    {
        $today = strtotime(date("d-m-Y", time()));
		$stmt = $this->db->prepare("SELECT count(*) FROM users where regtime >= :today");
        $stmt->execute(array(':today' => $today));

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getOldUsers()
    {
		$time = time();
        $oldtime = $time - 24 * 3600;
		$today = strtotime(date("d-m-Y", $time));
        $yesterday = strtotime(date("d-m-Y", $oldtime));
		$stmt = $this->db->prepare("SELECT count(*) FROM users where regtime BETWEEN :yesterday AND :today");
        $stmt->execute(array(':yesterday' => $yesterday, ':today' => $today));
		$number_of_rows = $stmt->fetchColumn();
		
		if($number_of_rows < 1){
			$number_of_rows = 1;
		}

        return $number_of_rows;
    }

    public function getTodayActiveusers()
    {
        $today = strtotime(date("d-m-Y", time()));
		$stmt = $this->db->prepare("SELECT count(*) FROM users where last_access >= :today");
        $stmt->execute(array(':today' => $today));

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getTotalTodayPoints()
    {
        $today = date("Y-m-d", time());
		$type = "Daily Checkin Credit Test Credit";
		$stmt = $this->db->prepare("SELECT SUM(points) FROM tracker where (date = :today AND type != :type)");
        $stmt->execute(array(':today' => $today, ':type' => $type));
        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getTotalYesterdayPoints()
    {
		$time = time();
        $oldtime = $time - 24 * 3600;
		$type = "Daily Checkin Credit Test Credit";
        $yesterday = date("Y-m-d", $oldtime);
		$stmt = $this->db->prepare("SELECT SUM(points) FROM tracker where (date = :yesterday AND type != :type)");
        $stmt->execute(array(':yesterday' => $yesterday, ':type' => $type));
		$number_of_rows = $stmt->fetchColumn();
		
		if($number_of_rows < 1){
			$number_of_rows = 1;
		}

        return $number_of_rows;
    }

    public function getTotalAllTimePoints()
    {
		$type = "Daily Checkin Credit Test Credit";
		$stmt = $this->db->prepare("SELECT SUM(points) FROM tracker where type != :type");
        $stmt->execute(array(':type' => $type));
        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getTotalMonthPoints()
    {
		$type = "Daily Checkin Credit Test Credit";
		$time = strtotime("01-" .date("m-Y", time()));
		$month = date("Y-m-d", $time);
		$stmt = $this->db->prepare("SELECT SUM(points) FROM tracker where (date >= :month AND type != :type)");
        $stmt->execute(array(':month' => $month, ':type' => $type));
        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getTotalWeekPoints()
    {
		$type = "Daily Checkin Credit Test Credit";
		$day = date('w');
		$week = date('Y-m-d', strtotime('-'.$day.' days'));
		$stmt = $this->db->prepare("SELECT SUM(points) FROM tracker where (date >= :week AND type != :type)");
        $stmt->execute(array(':week' => $week, ':type' => $type));
        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getCurrentTotalPoints() {
        $sql = "SELECT SUM(points) FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $row = $stmt->fetchColumn();
    }

    public function getCompletedRequests()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM Completed");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }
	
    public function getPendingRequests()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM Requests where status = 0");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getProcessingRequests()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM Requests where status = 2");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getRejectedRequests()
    {
        $stmt = $this->db->prepare("SELECT count(*) FROM Requests where status = 3");
        $stmt->execute();

        return $number_of_rows = $stmt->fetchColumn();
    }

    public function getConfig($value) {
        $sql = "SELECT config_value FROM configuration WHERE config_name = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':value' => $value));
        return $row = $stmt->fetchColumn();
    }

    public function getAdminUserName() {
        $sql = "SELECT username FROM admins WHERE id = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $row = $stmt->fetchColumn();
    }
    
    public function updateAnalyticsSessions() {
		$result = false;
        $today = date("Y-m-d", time());
        $sql = "SELECT * FROM analytics WHERE date = :today LIMIT 1";
        $stmt = $this->db->prepare($sql);
		$stmt->execute(array(':today' => $today));
		$number_of_rows = $stmt->fetchColumn();
		
		if ($number_of_rows > 0) {

				$sql = "UPDATE analytics SET sessions = sessions+1 WHERE date = :today";
				$stmt = $this->db->prepare($sql);
				$result = $stmt->execute(array(':today' => $today));
            
			
        }else{
			$sql = "INSERT INTO analytics (date,sessions,requests,completed) value (:today, 1,0,0)";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute(array(':today' => $today));
		}
		
        return $result;
    }

    public function isWhitelisted($ip)
    {
        $stmt = $this->db->prepare("SELECT id FROM whitelists WHERE ip_addr = (:ip) LIMIT 1");
        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {

                return true;
            }
        }

        return false;
    }
    

    function updateConfigs($value, $configname) {
        $sql = "UPDATE configuration SET config_value = :value WHERE config_name = :configname";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array(':value' => $value, ':configname' => $configname));
    }

    function updateAdnetworksIds($configname, $value) {
        $sql = "UPDATE adnetworks_ids SET config_value = :value WHERE config_name = :configname";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array(':value' => $value, ':configname' => $configname));
    }

    public function getofferStatusData($clickId){
        
        $result = array("error" => true,
                        "error_code" => ERROR_ACCOUNT_ID);

        $stmt = $this->db->prepare("SELECT * FROM offer_status WHERE cid = (:clickId) LIMIT 1");
        $stmt->bindParam(":clickId", $clickId, PDO::PARAM_INT);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch();

                $result = array("error" => false,
                                "error_code" => ERROR_SUCCESS,
                                "id" => $row['id'],
                                "cid" => $row['cid'],
                                "user" => $row['user'],
                                "of_id" => $row['of_id'],
                                "of_title" => $row['of_title'],
                                "of_amount" => $row['of_amount'],
                                "of_url" => $row['of_url'],
                                "partner" => $row['partner'],
                                "date" => $row['date'],
                                "status" => $row['status']);
            }
        }

        return $result;
    }

    public function sendPush($fcm_id, $title, $message, $image, $type) {
		
		$GOOGLE_API_KEY = $this->getConfig("FIREBASE_API_KEY");
		
		$fields = array(
        	'to'		=> $fcm_id ,
		'priority'	=> "high",
		'data'		=> array("title" =>$title, "message" =>$message, "image"=> $image, "type"=> $type),
        );
		
        $headers = array('https://fcm.googleapis.com/fcm/send','Content-Type: application/json','Authorization: key='.$GOOGLE_API_KEY);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Problem occurred: ' . curl_error($ch));
        }
		
        curl_close($ch);
         //echo $result;
		 //exit;
		
        return $result;
    }
	

}

