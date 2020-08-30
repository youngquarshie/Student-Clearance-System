<?php
$url = 'https://api.elasticemail.com/v2/email/send';

include('../shared/connection.php');
$designee_name= $_POST['designee_id'];
$user_email= $_POST['useremail'];
$index_no= $_POST['userid'];

$s="SELECT email FROM designee WHERE designee_id='$designee_name'";
$row=mysqli_query($con, $s) or die( mysqli_error($con));
$fetch=mysqli_fetch_assoc($row);
$designee_email=$fetch['email'];

try{
        $post = array('from' => $user_email,
		'fromName' => 'KTU Clearance',
		'apikey' => 'f8658ade-47bb-4727-bf03-ba9a7e2ab549',
		'subject' => $index_no,
		'to' => $designee_email,
		'bodyHtml' => '<h1>You have a request to approve</h1>',
		'bodyText' => 'You have a request to approve for'.$index_no,
		'isTransactional' => false);
		
		$ch = curl_init();
		curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
        ));
		
        $result=curl_exec ($ch);
        //echo $result;
        echo "Email Sent Succesfully";

}
catch(Exception $ex){
	echo $ex->getMessage();

}
//end of function

?>