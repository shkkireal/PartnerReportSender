<?php

mb_internal_encoding('UTF-8');

mb_regex_encoding('UTF-8');

mb_http_output('UTF-8');

mb_language('uni');



date_default_timezone_set('Europe/Moscow');

header('Content-type: text/html; charset=utf-8');
class PartnerReport
{
    protected $DATABASE_HOST = "";
    protected $DATABASE_NAME = "";
    protected $DATABASE_USER = "";
    protected $DATABASE_PASSWORD = "";

    public function __construct($data)
    {

        $this->partner = $data;
        $this->mysqli = new mysqli($this->DATABASE_HOST, $this->DATABASE_USER, $this->DATABASE_PASSWORD, $this->DATABASE_NAME);
        $this->today = date("Y-m-d H:i:s");

    }



    public function writepartnertransaktion()
    {


        $sql =
            "INSERT INTO `partner_proposols_request` (`id`, `Partner_email`, `partner_name`, `User_id`, `User_name`, `User_tel`, `User_email`, `User_epb`,`time`) 
             VALUES
            (NULL, '".$this->partner["email_partner"]."', '".$this->partner["partner_name"]."', '".$this->partner["user_id"]."', '".$this->partner["name"]."', '".$this->partner["telefon"]."', '".$this->partner["email"]."', '".$this->partner["epb"]."',  CURRENT_TIMESTAMP);";

        $result = $this->mysqli->query($sql);
        $this->nombertransaktion = $this->mysqli->insert_id;

       if($result) {
           return true;
       }

    }

    public function create(){

        $this->trasnsaktion = $this->writepartnertransaktion();

    }

}