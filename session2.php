<?php
// ເລີ່ມ Session
session_start();


// ການເອົາຄ່າຈາກ Session
echo "ຊື່ຜູ້ໃຊ້: " . $_SESSION['username'] . "<br>";
echo "ອີເມວ: " . $_SESSION['email'] . "<br>";

// ການກວດສອບ Session
if(isset($_SESSION['username'])) {
    echo "ທ່ານໄດ້ເຂົ້າສູ່ລະບົບແລ້ວ";
} else {
    echo "ທ່ານຍັງບໍ່ໄດ້ເຂົ້າສູ່ລະບົບ";
}

// ການລຶບ Session ຕາມຄີ
// unset($_SESSION['email']);

// ການທຳລາຍ Session ທັງໝົດ
// session_destroy();
?>