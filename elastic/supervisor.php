<?php
$url = 'https://api.elasticemail.com/v2/email/send';

include('../shared/connection.php');
$supervisor_id= $_POST['supervisor_id'];
$user_email= $_POST['user_email'];
$index_no= $_POST['user_id'];

$s="SELECT email FROM tbl_supervisors WHERE supervisor_id='$supervisor_id'";
$row=mysqli_query($con, $s) or die( mysqli_error($con));
$fetch=mysqli_fetch_assoc($row);
$supervisor_email=$fetch['email'];

try{
    $post = array('from' => $user_email,
        'fromName' => 'KTU Clearance',
        'apikey' => 'f8658ade-47bb-4727-bf03-ba9a7e2ab549',
        'subject' => $index_no,
        'to' => $supervisor_email,
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