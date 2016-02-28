<?php

require_once "utility.php";

session_start();

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = "Donald Trump";
}

$html = $img = "";

$result = queryMysql('SELECT * FROM `Profile` WHERE `Name`="'.$name.'" ORDER BY `Score` DESC');
$num = $result->num_rows;
if ($num > 0) {
    for ($j = 0; $j < $num; $j++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id = $row['ID'];
        $img = $row['ImageLink'];
        $name = $row['Name'];
        $statement = $row['Statement'];
        $score = $row['Score'];
        $html .= '<div class="display_wrap"><div class="display_text">';
        $html .= $statement;
        if (isset($_SESSION[strval($id)."f"]) && $_SESSION[strval($id)."f"]) {
            $html .= '</div><div class="vote_wrap" value='.$id.'><div class="vote_up" style="background-color: green;" value="'.$name.'">&#128077;</div><div class="vote_down" value="'.$name.'">&#128078;</div></div>';
        } else if (isset($_SESSION[strval($id)."f"]) && !$_SESSION[strval($id)."f"]) {
            $html .= '</div><div class="vote_wrap" value='.$id.'><div class="vote_up" value="'.$name.'">&#128077;</div><div class="vote_down" style="background-color: red;" value="'.$name.'">&#128078;</div></div>';
        } else {
            $html .= '</div><div class="vote_wrap" value='.$id.'><div class="vote_up" value="'.$name.'">&#128077;</div><div class="vote_down" value="'.$name.'">&#128078;</div></div>';
        }
        if ($score > 0) {
            $html .= '<div class="vote_score green_score">'.$score.'</div></div>';
        } else if ($score < 0) {
            $html .= '<div class="vote_score red_score">'.$score.'</div></div>';
        } else {
            $html .= '<div class="vote_score">0</div></div>';
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="src/jquery.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
</head>
<body>
    <div id="first_display" class="display_wrap">
        <form action="form.php" method="get">
            <button id="set_image">Set image</button>
        </form>
        <img id="form_photo" src="<?php echo $img; ?>">
        <div>
            <label for="input_text" id="input_text_label">In 3 words, <?php echo $name; ?> is</label>
            <input id="input_text" type="text"></input><button id="input_submit">enter</button>
        </div>
    </div>
    <div id="outer_wrap">
        <div id="id_vote_boxes">
            <?php echo $html; ?>
        </div>
    </div>
    <form id="form_vote">
        <input type="hidden" id="id_id" name="id">
        <input type="hidden" id="id_name" name="name">
        <input type="hidden" id="id_score" name="score">
        <input type="hidden" id="id_up" name="up">
    </form>
</body>
</html>