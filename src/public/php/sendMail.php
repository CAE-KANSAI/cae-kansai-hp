<?php

$emailTo = "a-nakamura@studio-spoon.co.jp";

//Initial response is NULL
$response = null;

//Initialize appropriate action and return as HTML response
if (isset($_POST["action"])) {
    $action = $_POST["action"];

    switch ($action) {
        case "SendMessage": {
                if (isset($_POST["email"]) && !empty($_POST["email"])) {

                    $companyName = $_POST["companyName"];
                    $name = $_POST["name"];
                    $departmentName = $_POST["departmentName"];
                    $phoneNumber = $_POST["phoneNumber"];
                    $emailFrom = $_POST["email"];
                    $messageTitle = $_POST["subject"];
                    $messageBody = $_POST["message"];

                    $subject = "CAE関西お問い合わせフォーム | " . $messageTitle . " | " . $companyName . " " . $name . "様";

                    $message = "●お名前：" . $name . "様" . "<br/><br/>" . "●会社名：" . $companyName . "<br/><br/>" . "●部署名：" . $departmentName . "<br/><br/>" . "●電話番号：" . $phoneNumber . "<br/><br/>" . "●メールアドレス：" . $emailFrom . "<br/><br/>" . "●件名：" . $messageTitle . "<br/><br/>" . "●お問い合わせ本文：" . "<br/><br/>" . $messageBody . "<br/><br/>";

                    $response = (SendEmail($message, $subject, $name, $emailFrom, $emailTo)) ? '送信が完了しました。' : "何らかのエラーにより、送信ができませんでした。恐れ入りますが、お電話でお問い合わせください。";
                } else {
                    $response = "何らかの理由により送信が出来ませんでした。";
                }
            }
            break;
        default: {
                $response = "エラー: " . $action;
            }
    }
}


if (isset($response) && !empty($response) && !is_null($response)) {
    echo '{"ResponseData":' . json_encode($response) . '}';
}

function SendEmail($message, $subject, $name, $from, $to)
{
    $isSent = false;
    // Content-type header
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Additional headers    
    $headers .= 'From: ' . $name . '<' . $from . '>';

    mail($to, $subject, $message, $headers);
    if (mail) {
        $isSent = true;
    }
    return $isSent;
}
