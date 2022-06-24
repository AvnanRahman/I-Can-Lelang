<?php
$db_con = mysqli_connect("localhost", "root", "", "icanmerge");
if (!$db_con) {
    echo "Tidak terkoneksi ke Database";
}
