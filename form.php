<?php

require_once "utility.php";

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = "Donald Trump";
}

$html = "";

$result = queryMysql('SELECT * FROM `Profile` WHERE `Name`="'.$name.'" ORDER BY `Score` DESC');
$num = $result->num_rows;
if ($num > 0) {
    for ($j = 0; $j < $num; $j++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $name = $row['Name'];
        $statement = $row['Statement'];
        $score = $row['Score'];
        $html .= '<div class="display_wrap"><div class="display_text">';
        $html .= $statement;
        $html .= '</div><div class="vote_wrap"><div class="vote_up">Up</div><div class="vote_down">Do</div></div></div>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="outer_wrap">
        <div id="first_display" class="display_wrap">
            <label for="input_text" id="input_text_label">In 3 words, <?php echo $name; ?> is</label>
            <input id="input_text" type="text"></input><button id="input_submit">enter</button>
        </div>
        <?php echo $html; ?>
    </div>
</body>
</html>