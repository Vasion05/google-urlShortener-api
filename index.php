<!DOCTYPE html>
<html>
<head>
    <title>Google API URL Shortener</title>
</head>
<body>

    <?php
    if(!empty($_POST['url'])){

        $longUrl = $_POST['url'];

        $apiKey  = 'AIzaSyBw8s-s-aSiPA9nLtuuuzyXhMcWSrBBee8'; 
        
        $postData = array('longUrl' => $longUrl);
        $jsonData = json_encode($postData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        $response = curl_exec($ch);
        $json = json_decode($response);

        curl_close($ch);
        echo '<h4>Shortened URL : '.$json->id.'</h4>';
    }
    ?>

    <form action="" method="post" accept-charset="utf-8">
        <table>
            <tr>
                <td>Input LongURL: </td>
                <td><input type="text" name="url"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>