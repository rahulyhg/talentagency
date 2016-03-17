<?php
include ("functions.php");
if(isset($_GET['talent_list_id']))
{
	$talent_list_id = $_GET['talent_list_id'];
 
 $sql = "SELECT
			 `talent_list_title`
		    ,`talent_list_details`
		    
		FROM
		   `tams_talent_lists`
		WHERE (`talent_list_id` =$talent_list_id);";
$sql_list_title = DB::queryFirstRow($sql);
 
ob_start();
 
require 'pdf_list.php';

$contents = ob_get_contents();

ob_end_clean();

include("../mpdf/mpdf.php");
$mpdf=new mPDF(); 

if(isset($_GET['action'])){
		// Function Date
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$mpdf->WriteHTML(utf8_encode($contents));

		$content = $mpdf->Output('', 'S');

		$content = chunk_split(base64_encode($content));
		$mailto = 'mansoor@sutlej.net'; //Mailto here
		$from_name = 'Sutlej Solution'; //Name of sender mail
		$from_mail = 'system@mypayapponline.com'; //Mailfrom here
		$subject = 'Payslip';
		$message = 'mailmessage';
		$filename = $payslip_title.date("d-m-Y_H-i",time()); //Your Filename with local date and time
 
		//Headers of PDF and e-mail
		$boundary = "XYZ-" . date("dmYis") . "-ZYX";

		$header = "--$boundary\r\n";
		$header .= "Content-Transfer-Encoding: 8bits\r\n";
		$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n\r\n"; // or utf-8
		$header .= "$message\r\n";
		$header .= "--$boundary\r\n";
		$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n";
		$header .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$header .= "$content\r\n";
		$header .= "--$boundary--\r\n";

		$header2 = "MIME-Version: 1.0\r\n";
		$headers .= "To: ".$mailto." <".$mailto.">\r\n";
 		$header2 .= "From: ".$from_name." \r\n";
		$header2 .= "Return-Path: $from_mail\r\n";
		$header2 .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
		$header2 .= "$boundary\r\n";
 
		mail($mailto,$subject,$header,$header2, "-r".$from_mail);

		$mpdf->Output($filename ,'I');

		exit;

}
$mpdf->WriteHTML($contents);
$mpdf->Output();

exit;
}

?>