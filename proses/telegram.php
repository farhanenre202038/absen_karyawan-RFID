<?php
    sendMessage($message_datang);

    function sendMessage($message_datang) {
        $url = "API_KEY" .$message_datang;
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
