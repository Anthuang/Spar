<?php

require_once "utility.php";

$first_name = $rest_name = $statement = $path = $html = "";

$result = queryMysql('SELECT * FROM `Profile` GROUP BY `Name`');
$num = $result->num_rows;
if ($num > 0) {
	$rand_num = rand(0, $num - 1);
	$result2 = queryMysql('SELECT `Name`, `Statement`, MAX(Score), `ImageLink` FROM `Profile` GROUP BY `Name` LIMIT '.$rand_num.',1');
	$row2 = $result2->fetch_array(MYSQLI_ASSOC);
	$name = $row2['Name'];
	$statement = $row2['Statement'];
	$path = $row2['ImageLink'];
	$name_array = explode(" ", $name);
	$first_name = $name_array[0];
	$rest_name = "";
	for ($j = 1; $j < sizeof($name_array); $j++) {
		$rest_name .= $name_array[$j] . " ";
	}
	$html .= '<div id="text_wrap"><div id="static_text">' . $first_name . '<br>' . $rest_name . ' is</div>';
	$result3 = queryMysql('SELECT `Statement` FROM `Profile` WHERE `Name`="'.$name.'" ORDER BY `Score` DESC');
	$num3 = $result3->num_rows;
	$row3 = $result3->fetch_array(MYSQLI_ASSOC);
	$html .= '<div class="flow_text" id="flow_text0">' . $row3['Statement'] . '<span id="blinker">|</span></div>';
	for ($k = 1; $k < $num3; $k++) {
		$row3 = $result3->fetch_array(MYSQLI_ASSOC);
		$html .= '<div class="flow_text" id="flow_text'.$k.'" style="display: none;">' . $row3['Statement'] . '<span id="blinker">|</span></div>';
	}
	$html .= '</div>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>The Hate Generator</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <img src=<?php echo $path; ?>>
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
    <?php echo $html; ?>
    <a href="form.php"><button id="write_button">write your own</button></a>
    <input type="hidden" id="id_num_statements" value=<?php echo $num3; ?>>
</body>
</html>