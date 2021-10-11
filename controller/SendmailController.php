<?php 
    class SendmailController{
        function sendmail(){
            require 'sendEmail.php';
            header("location:/?page=order&action=order");
        }
    }
?>