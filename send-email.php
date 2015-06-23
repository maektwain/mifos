<?php
if($_POST)
{
    $from       = "mifos@mifos.com";
    
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( 
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output);
    }
    
    $to             = "admin@gmail.com";
    $subject        = "New Registration";
    $message        = "Hello";
    
    $headers = 'From: mifos' . "\r\n" .
    'Reply-To: '.$from.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to, $subject, $message, $headers);
    
}
?>
