<?php

$ipaddress = $_SERVER['REMOTE_ADDR'];
if (!filter_var($ipaddress, FILTER_VALIDATE_IP) === false){
  $ipaddress = $ipaddress;
} else {
  $ipaddress = "Invalid IP-address";
}

$page =  "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
$page = filter_var($page, FILTER_SANITIZE_URL);
if (!filter_var($page, FILTER_VALIDATE_URL) === false){
 $page = $page;
} else {
  $page = "url is invalid";
};

if (isset($_SERVER['HTTP_REFERER'])){
  $referrer = $_SERVER['HTTP_REFERER'];
  $referrer = filter_var($referrer, FILTER_SANITIZE_URL);
  if (!filter_var($referrer, FILTER_VALIDATE_URL) === false) {
  $referrer = $referrer;
    } else {
      $referrer = "invalid url";
    }
} else {
  $referrer = "not set";
};

$datetime = date("j F, Y, g:i a");

$useragent = $_SERVER['HTTP_USER_AGENT'];
$useragent = filter_var($useragent, FILTER_SANITIZE_STRING);





$connection = mysqli_connect("***", "***", "***", "***", ****);

$result = $connection->query("INSERT INTO visitor_details VALUES('$ipaddress', '$page', '$referrer', '$datetime', '$useragent')");

?>
