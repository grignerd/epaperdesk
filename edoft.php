<html>
<head>
    <title>EpaperDesk File Online Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="row">
    <div style="width: 100%; height: 100px;"></div>
    <div class="container" align="center">
        <img src="https://epaperdesk.com/img/epaper-desk-logo-black.png" width="240">
        <h5>Epaper Desk Online File Transfer.</h5>
    </div><br><br>
    <div style="width: 100%; height: 150px;"></div>
    <div class="container" align="center">

<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(in_array  ('curl', get_loaded_extensions())) {
    $file = 'epaperdesk_v1.zip';
    set_time_limit(0);
    $fp = fopen ($file, 'w+');
    $url = "https://epaperdesk.com/download/epaperdesk_v151.zip";
    $ch = curl_init(str_replace(" ","%20",$url));
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);

    if($data=='1'){
        echo "<h3 style='color: GREEN'><i class='fa fa-cloud-download'></i> Online File Transfered Succesful.</h3>";

        $path = pathinfo(realpath($file), PATHINFO_DIRNAME);

        $zip = new ZipArchive;
        $res = $zip->open($file);
        if ($res === TRUE) {

          $zip->extractTo($path);
          $zip->close();
          echo "<h5 style='color: GREEN'><i class='fa fa-file-archive-o'></i> File Extract Succesful.</h5>";
          unlink($file);

          ECHO '<br><a href="/admin" class="btn btn-primary font-weight-bold"><i class="fa fa-globe"></i> GO TO SETUP</a>';

        }else{
            
            echo "<i class='fa fa-times-circle'></i> File Extract failed, Please extract menually. Or follow the video. <a href='https://www.youtube.com/watch?v=po8vTLGv6eU' target='_blank'>See</a>";
        
        }
        chmod(uploads, 0777);
        unlink('edoft.php');
        

    }else{
        echo "<h3 style='color: RED'><i class='fa fa-times-circle'></i> Sorry, File Transfered Unsuccesful.</h3>";
    }
}
else{
    echo "<h3 style='color: RED'><i class='fa fa-times-circle'></i> Sorry, CURL is inactive on your web server.</h3>";
}
?>

    </div>
</div>
<hr><br>
<div class="container" align="center">
    <h6><i class="fa fa-phone-square"></i> For any query or issue contact epaperdesk team <a href="https://epaperdesk.com/contact" target="_blank">Visit</a></h6>
</div><br>
<style>
    body, html{width:  100%; height: 100%; padding: 0px; margin: 0px; background: #f0f0f0; overflow: hidden;}
</style>

</body>
</html>