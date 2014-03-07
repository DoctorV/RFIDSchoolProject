<?php
  
$sec = 5;
header("Refresh: $sec");
   
$ftp_server = "ftp.octoleaf.com";
$ftp_user = "forproject@octoleaf.com";
$ftp_pass = "3Mse6099!";

$seconds = 10;

// set up a connection or die
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

// define some variables
$local_file = 'bill.txt';
$server_file = 'bill.txt';

// try to login
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
	echo "<HTML><head><TITLE>Home Automation</TITLE>";
	echo "<link rel='stylesheet' type='text/css' href='stylesheet.css'>";
	echo "</HEAD><BODY>";
	
	$contents = ftp_nlist($conn_id, ".");
	
	/*foreach ($contents as $v) {
		echo $v, "<BR>";
	}*/
	
	foreach ($contents as $v) {
		if ($v == "bed.txt") {
			$x = 200;
			$y = 500;
			echo "<img STYLE='position:absolute; TOP:500px; LEFT:300px;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:200px; RIGHT:600px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:50px; RIGHT:1050px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:700px; RIGHT:120px;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; TOP:800px; RIGHT:120px;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "px; LEFT:", $x, "px;' src='.\images\bill.png'>";
		} elseif ($v == "living.txt") {
			$x = 700;
			$y = 500;
			echo "<img STYLE='position:absolute; TOP:500px; RIGHT:600px;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:200px; RIGHT:600px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:50px; RIGHT:1050px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:700px; RIGHT:120px;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; LEFT:300px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:800px; RIGHT:120px;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "px; RIGHT:", $x, "px;' src='.\images\bill.png'>";
		} elseif ($v == "kitchen.txt") {
			$x = 700;
			$y = 200;
			echo "<img STYLE='position:absolute; TOP:200px; RIGHT:600px;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:700px; RIGHT:120px;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; LEFT:300px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:50px; RIGHT:1050px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:800px; RIGHT:120px;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "px; RIGHT:", $x, "px;' src='.\images\bill.png'>";
		} elseif ($v == "bath.txt") {
			$x = 1100;
			$y = 50;
			echo "<img STYLE='position:absolute; TOP:700px; RIGHT:120px;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; TOP:50px; RIGHT:1050px;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; RIGHT:600px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; LEFT:300px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:800px; RIGHT:120px;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "px; RIGHT:", $x, "px;' src='.\images\bill.png'>";	
		} elseif ($v == "." or $v == ".." or $v == " ") {
			$x = -100;
			$y = -100;
			echo "<img STYLE='position:absolute; TOP:200px; RIGHT:600px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; RIGHT:600px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:500px; LEFT:300px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:50px; RIGHT:1050px;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:700px; RIGHT:120px;' src='.\images\away.png'>";
			echo "<img STYLE='position:absolute; TOP:800px; RIGHT:120px;' src='.\images\Red.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "px; LEFT:", $x, "px;' src='.\images\bill.png'>";
		} else {
			echo "nothing";
		}
	}
	
	echo "</BODY></HTML>";
} else {
    echo "Couldn't connect!";
}

// close the connection
ftp_close($conn_id);  
?>
