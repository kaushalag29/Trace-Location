<html>
<?php    
function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
 $PublicIP = get_client_ip(); 
 $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
 $json  =  json_decode($json ,true);
 $country =  $json['country_name'];
 $region= $json['region_name'];
 $city = $json['city'];
$time=$json['time_zone'];
$zipcode=$json['zip_code'];
$lat=$json['latitude'];
$long=$json['longitude'];
$txt = $city." ".$region." ".$country." ".$PublicIP." ".$lat." ".$long." ".$time." ".$zipcode;
$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
?>
<img src="img.jpg">
</body>
</html>
