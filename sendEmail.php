
<?php
    include 'inc/header.php';
    $id = Session::get('customer_id');
    $get_customers = $cs->get_mail($id);
    if ($get_customers) {
        while ($result = $get_customers->fetch_assoc()) {
            $email = $result["email"];
        }
    }
?>

<?php
    $customer_name = Session::get('customer_name');
    $get_order = $ct->get_cart_ordered($id);
    $content = "<div style='width:100%;border:none;'>";
    $content .= "<table style='border-collapse: collapse;border:none;width:100%;'>";
    $content .= "
        <tr>  <td colspan='3'>
        <p>
        Hi  $customer_name,<br>
        Hope you enjoy your quality time with our services,<br>
        Here is your bill for payment,<br>
        </p>
        </td>
        </tr>
                ";
    $content .= "<tr>  <td colspan='3'><table style='width:100%;'><tr style='width:100%;'>
        <td style='width:50%;padding-bottom:20px;line-height:20px;'>
            CP-emarket Inc.<br/>
            1 Nguyen Hue<br/>
            Quan 1, TPHCM
        </td>
        <td style='width:0%;'></td>
        <td style='text-align: right;padding-right: none; margin-right: none;width:50%;padding-bottom:20px;line-height:20px;'>
            Customer:<br/>
            $customer_name<br/>
            $email
        </td>
    </tr>";
    $content .= " </table></td></tr>";
    $content .= "<tr style='background: #eee;
                    border-bottom: 1px solid #ddd;
                    border-top: 1px solid #ddd;
                    font-weight: bold;'><th style='text-align: left;border:none;margin-left:20px;line-height:30px;width:40%;'>Product</th><th style='border:none;line-height:30px;width:20%;'>Quantity</th><th style='text-align: right;border:none;line-height:30px;width:40%;'>Price</th></tr>";
    if ($get_order->num_rows > 0) {
        $total = 0;
        $i = 0;
        while ($result = $get_order->fetch_assoc()) {
            $product_name = $result['ProductName'];
            $quantity = $result['quantity'];
            $price = $result['price'];
            $total += $price;
            $i++;
            $content .= "<tr style='text-align: center;border-bottom: 1px solid #eee;'> <td style='text-align: left;border:none;line-height:30px;width:40%;'>$product_name</td> <td style='border:none;line-height:30px;width:20%;'>$quantity</td> <td style='text-align: right;border:none;line-height:30px;width:40%;'>" . $fm->format_currency($price) . "</td></tr>";
        }
    }
    $content .= "
        <tr>
        <td colspan='3' style='text-align: right;padding-top:20px;width:80%;'>Total:" . " " . $fm->format_currency($total) . " " . "VND" . "</td>
        </tr>";
    $content .= "
        <tr style='border-bottom: 1px solid #eee;padding-bottom:50px;'>
        <td colspan='3' style='text-align: center;'>
        <p style='text-align: center;margin: 0px;padding: 0px;padding-top:40px;'>Thanks for choosing us!</p>
        <p> Visit us at <a>https://emarket.com/</a></p>
        </td>
        </tr>";
    $content .= "</table>";
    $content .= "</div>";
?>


<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'caophat2713@gmail.com';
    $mail->Password = 'bzkknwyojhcegccb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('caophat2713@gmail.com');
    $mail->addAddress("$email");
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Your Order Bill';
    $mail->Body = $content;

    $mail->send();
    echo 'Đã gởi mail thành công';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<?php
include 'inc/footer.php';
?>