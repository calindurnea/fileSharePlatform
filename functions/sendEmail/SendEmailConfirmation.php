<?php

function emailConfirmation($sUserEmail, $emailToken)
{
    $to=$sUserEmail;
    $subject="Activate your account on AirQuick ";
    $from = 'emailconfirmation@airquick.dk';
    $body="This is the activation e-mail to your AirQuick account. Please Click On This <a href='confirm.php?et=$emailToken'>link</a>to activate your account.";
    $headers = "From:".$from;
echo $body;
    if (mail($to,$subject,$body,$headers)) {
      	echo "An Activation Code Is Sent To You Check You Email";
    }else{
      die("email failed");
    }
    
}

 ?>
