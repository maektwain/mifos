<?php
if($_POST)
{
    $from       = "mifos@mifos.com"; //Recipient email, Replace with own email here $scope.jsonData.emailAddress
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    }
    
    //Sanitize input data using PHP filter_var().
    $to             = "admin@gmail.com";
    $subject        = "New Registration";
    $message        = "Hello";
    
    //proceed with PHP email.
    $headers = 'From: mifos' . "\r\n" .
    'Reply-To: '.$from.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to, $subject, $message, $headers);
    
}
?>