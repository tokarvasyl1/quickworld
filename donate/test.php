<?php
require_once('Rcon.php');
if(isset($_GET['secretkey'])) $secretkey = $_GET['secretkey'];
if(isset($_GET['name'])) $name = $_GET['name'];
if(isset($_GET['amount'])) $amount = $_GET['amount'];
if(isset($_GET['message'])) $message = $_GET['message'];
 
$strcom = array(
  "statusquick" => "lp user {login} parent addtemp quick 30d",
  "statusbaro" => "lp user {login} parent addtemp baro 30d",
  "statusvikont" => "lp user {login} parent addtemp vikont 30d",
  "statuscomte" => "lp user {login} parent addtemp comte 30d",
  "statusmarkiz" => "lp user {login} parent addtemp markiz 30d",
  "statusprorex" => "lp user {login} parent addtemp prorex 30d",
  "statusdux" => "lp user {login} parent addtemp dux 30d",
  "statusimperatrix" => "lp user {login} parent addtemp imperatrix 30d",
  "statusquickcoins100" => "p give {login} 100",
  "statusquickcoins250" => "p give {login} 250",
  "statusquickcoins500" => "p give {login} 550",
  "statusquickcoins1000" => "p give {login} 1200",
  "statuscase1" => "cubelets give {login} status 1",
  "statuscase3" => "cubelets give {login} status 3",
  "statuscase5" => "cubelets give {login} status 5",
  "statuscase10" => "cubelets give {login} status 10",
  "statuscaseqc1" => "cubelets give {login} quickcoins 1",
  "statuscaseqc3" => "cubelets give {login} quickcoins 3",
  "statuscaseqc5" => "cubelets give {login} quickcoins 5",
  "statuscaseqc10" => "cubelets give {login} quickcoins 10"
  )

?>
<pre>
<?php
// var_dump($_GET);

$secret = "tdQOWvj04kggCuhVbw4g6YOO6sY"; // secretkey
$command = $strcom[$message];
$command = str_replace("{login}", $name, $strcom[$message]);
$host = '151.80.47.121'; // Server host name or IP
$port = 25555;                      // Port rcon is listening on
$password = 'ASD77sdsqsdS66ss'; // rcon.password setting set in server.properties
$timeout = 2;                       // How long to timeout.
use Thedudeguy\Rcon;
if ($secretkey == $secret) 
{
$rcon = new Rcon($host, $port, $password, $timeout);
}
if ($rcon->connect())
{
  $rcon->sendCommand($command);
}
?> 
