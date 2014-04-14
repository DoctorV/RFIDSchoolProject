<?php
  
$sec = 5;
header("Refresh: $sec");
   
$ftp_server = "ftp.octoleaf.com";
$ftp_user = "-";
$ftp_pass = "-";

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
	
	foreach ($contents as $v) {
		if ($v == "bed.txt") {
			$x = 13;
			$y = 65;
			echo "<img STYLE='position:absolute; TOP:65%; LEFT:20%;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:20%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:5%; LEFT:33%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:30%; RIGHT:7%;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:15%; RIGHT:7%;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "%; LEFT:", $x, "%;' src='.\images\bill.png'>";
		} elseif ($v == "living.txt") {
			$x = 35;
			$y = 65;
			echo "<img STYLE='position:absolute; TOP:65%; RIGHT:30%;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:20%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; LEFT:20%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:5%; LEFT:33%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:30%; RIGHT:7%;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:15%; RIGHT:7%;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "%; RIGHT:", $x, "%;' src='.\images\bill.png'>";
		} elseif ($v == "kitchen.txt") {
			$x = 35;
			$y = 20;
			echo "<img STYLE='position:absolute; TOP:20%; RIGHT:30%;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; LEFT:20%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:5%; LEFT:33%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:30%; RIGHT:7%;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:15%; RIGHT:7%;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "%; RIGHT:", $x, "%;' src='.\images\bill.png'>";
		} elseif ($v == "bath.txt") {
			$x = 27;
			$y = 5;
			echo "<img STYLE='position:absolute; TOP:5%; LEFT:33%;' src='.\images\lightOn.png'>";
			echo "<img STYLE='position:absolute; TOP:20%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; LEFT:20%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:30%; RIGHT:7%;' src='.\images\home.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:15%; RIGHT:7%;' src='.\images\Green.png'>";
			echo "<img STYLE='position:absolute; TOP:", $y, "%; LEFT:", $x, "%;' src='.\images\bill.png'>";	
		} elseif ($v == "." or $v == ".." or $v == " ") {
			$x = -100;
			$y = -100;
			echo "<img STYLE='position:absolute; TOP:20%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; RIGHT:30%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:65%; LEFT:20%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; TOP:5%; LEFT:33%;' src='.\images\lightOff.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:30%; RIGHT:7%;' src='.\images\away.png'>";
			echo "<img STYLE='position:absolute; BOTTOM:15%; RIGHT:7%;' src='.\images\Red.png'>";
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
