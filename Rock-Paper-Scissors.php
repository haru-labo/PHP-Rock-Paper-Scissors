<?php 
//変数初期化
$my_hand = '';
$enemy_hand = '';
$result = '';

//自分
if (isset($_POST['hand']) === TRUE) {
    $my_hand = $_POST['hand'];

    //相手
    $enemy_hand = strval(mt_rand(0, 2));

    //結果
    $result = result($my_hand, $enemy_hand);
}

//結果
function result($my_hand , $enemy_hand) {
    if ($my_hand === $enemy_hand) {
        $result = 'Drow!';
    } elseif (($my_hand === '0' && $enemy_hand === '1') || ($my_hand === '1' && $enemy_hand === '2') || ($my_hand === '2' || $enemy_hand === '0')) {
        $result = 'Win!';
    } else {
        $result = 'Lose!';
    }
    return $result;
}

//手の表示
function disp_hand(string $hand): string {
    if ($hand === '') {
        return '';
    } elseif ($hand === '0') {
        return 'グー';
    } elseif ($hand === '1') {
        return 'チョキ';
    } else {
        return 'パー';
    }
}

//エスケープ処理
function e(string $str, string $charset = 'UTF-8'): string {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>じゃんけん勝負</title>
</head>
<body>
    <h1>じゃんけん勝負</h1>
    <p>自分：<?php print e(disp_hand($my_hand)); ?></p>
    <p>相手：<?php print e(disp_hand($enemy_hand));  ?></p>
    <p>結果：<?php print e($result); ?></p>
    <form method="post">
        <label><input type="radio" name="hand" value="0">グー</label>
        <label><input type="radio" name="hand" value="1">チョキ</label>
        <label><input type="radio" name="hand" value="2">パー</label>
        <p><input type="submit" value="勝負！"></p>
    </form>
</body>
</html>