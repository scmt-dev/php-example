<?php
// ການສ້າງ Cookie
$cookie_name = "user";
$cookie_value = "ທ້າວ ວັນນາ";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // ເກັບໄວ້ 30 ມື້
setcookie('cookie1', $cookie_value, time() + (86400), "/"); // ເກັບໄວ້ 1 ມື້
setcookie('cooki2', $cookie_value, time() + (86400 / 2), "/"); // ເກັບໄວ້ 1/2 ມື້

// ການອ່ານ Cookie
if(isset($_COOKIE[$cookie_name])) {
    echo "Cookie '" . $cookie_name . "' ມີຄ່າ: " . $_COOKIE[$cookie_name];
} else {
    echo "Cookie '" . $cookie_name . "' ບໍ່ມີຄ່າ";
}

// ການລຶບ Cookie
// setcookie($cookie_name, "", time() - 3600, "/"); // ຕັ້ງເວລາໃຫ້ເປັນອະດີດ
?>