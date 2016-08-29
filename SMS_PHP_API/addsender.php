<?php
        include('sms.class.php');

        // Malath_SMS(User,Pass,PHP File Encode)

        $DTT_SMS = new Malath_SMS("YourUserName","YourPassword",'UTF-8');
        include('formsender.php');
        $Name = $_POST['Name'];
        if($_POST['Name']){
        $Send = $DTT_SMS->AddSender($Name);
        /*
         echo $DTT_SMS->StrLen($SmS_Msg);
         echo '<br />';
         echo $DTT_SMS->Count_MSG($SmS_Msg);
        */
        echo '<br /><br /><b style="color:#003300">Send Result : </b>';
        echo '<pre>';
        print_r($Send);
        echo '</pre>';

     }


?>

