<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "あなたのメールアドレス@gmail.com"; // ここを受け取りたいメアドに変更
    $subject = "【新規チーム登録申請】" . $_POST['team_name'];
    
    $body = "チーム名: " . $_POST['team_name'] . "\n";
    $body .= "都道府県: " . $_POST['pref'] . "\n";
    $body .= "市区町村: " . $_POST['city'] . "\n";
    $body .= "特徴: " . implode(", ", $_POST['features']) . "\n";
    $body .= "紹介文: \n" . $_POST['description'] . "\n\n";
    $body .= "代表者連絡先: " . $_POST['email'];

    $headers = "From: webmaster@japanmedtech.com"; // 自分のドメインのアドレス

    if (mb_send_mail($to, $subject, $body, $headers)) {
        echo "申請が完了しました。確認後、順次掲載いたします。";
    } else {
        echo "送信に失敗しました。";
    }
}
?>