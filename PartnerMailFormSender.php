<?php
require_once ('classes/PartnerReport.php');
require_once ('classes/PartnerReportSender.php');



if(isset($_POST)) {

    $report = new PartnerReport($_POST);
    $report->create();

   $reqest = new PartnerReportSender($report);

    $reqest->send_report();

    echo "true";


}
else echo "false";
