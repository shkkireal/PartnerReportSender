<?php
require_once ('classes/Mail.php');
mb_internal_encoding('UTF-8');

mb_regex_encoding('UTF-8');

mb_http_output('UTF-8');

mb_language('uni');



date_default_timezone_set('Europe/Moscow');

header('Content-type: text/html; charset=utf-8');
class PartnerReportSender extends Mail
{
    protected $emailTo = "";

    protected $emailFrom = "";

    public function __construct($report){

        $this->report = $report;
        $this->today = date("Y-m-d");
    }
    public function send_report(){

        $subject_partner="Заявка № ".$this->report->nombertransaktion." от ".$this->today;
        $message_partner = "<h1>Добрый день !</h1> 
<p> Поступила новая заяка на получение скидки от члена РПРАЭП
<p> Дата: <b>".$this->today."</b>
<p> ФИО : <b>".$this->report->partner['name']." </b>
<p> Электронный профсоюзный билет: <b>".$this->report->partner['epb']." </b>
<p> Телефон : <b>".$this->report->partner['telefon']." </b>

";

        $subject_user="Заявка № ".$this->report->nombertransaktion." к партнеру ".$this->report->partner['partner_name']." от ".$this->today;
        $message_user = "<h1>Добрый день уважаемый ".$this->report->partner['name']."! </h1> 
<p> Вы отправили заяку нашему партнеру -".$this->report->partner['partner_name']." на получение скидки как участник программы преференций РПРАЭП
<p> Партнер скоро с вами свяжется
<p> Если партнер на связался с вами или нарушил описанные на сайте условия соглашения 
<p>- убедительно просим вас сообщить нам об этом на почту report@card.profatom.ru.
<p> Дата: <b>".$this->today."</b>
<p> ФИО : <b>".$this->report->partner['name']." </b>
<p> Электронный профсоюзный билет: <b>".$this->report->partner['epb']." </b>
<p> Телефон : <b>".$this->report->partner['telefon']." </b>

";
        //mail partner
        $mail = new Mail;
        $mail->from($this->emailFrom);
        $mail->to($this->report->partner['email_partner']);
        $mail->subject = $subject_partner;
        $mail->body =$message_partner;
        $mail->send();
        //mail manager
        $mail_copy_manager = new Mail;
        $mail_copy_manager->from($this->emailFrom);
        $mail_copy_manager->to($this->emailTo);
        $mail_copy_manager->subject = $subject_partner;
        $mail_copy_manager->body =$message_partner;
        $mail_copy_manager->send();
        //mail user
        $mail_copy_user = new Mail;
        $mail_copy_user->from($this->emailFrom);
        $mail_copy_user->to($this->report->partner['email']);
        $mail_copy_user->subject = $subject_user;
        $mail_copy_user->body = $message_user;
        $mail_copy_user->send();
        return $mail;


}



}