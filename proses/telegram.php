<?php
    // $telegram_id = 804116558;
    // $message_datang = 'Selamat Datang, Farhan Waktu Kedatangan Mu 12:20:20';
    // $secret_token = '5712846332:AAH4pGV0iRkVDkwS1WqEcUB5KyoIaDZSvwc';
    sendMessage($message_datang);

    function sendMessage($message_datang) {
        $url = "https://api.telegram.org/bot5712846332:AAH4pGV0iRkVDkwS1WqEcUB5KyoIaDZSvwc/sendMessage?chat_id=804116558&text=" .$message_datang;
        $ch = curl_init();
        $optarray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optarray);
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if($err){
            echo 'PESAN GAGAL :'. $err; 
        }else{
            echo 'PESAN BERHASIL';
        }
    }

?>