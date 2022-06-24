<?php
include 'koneksi.php';
include 'detail_product.php';
if (isset($_POST['submit'])) {

    $tawar = $_POST['tawaran'];
    if ($sementara < $tawar) {
        $lastbid = mysqli_query($db_con, "SELECT last_bid FROM bid_log WHERE user_id=$idU AND bid_order_id=$idProduk");
        $row = mysqli_fetch_array($lastbid);
        if ($row == null) {
            $insert = mysqli_query($db_con, "INSERT INTO bid_log VALUES('$idU','$idProduk','$tawar')");
        } else {
            $update2 = mysqli_query($db_con, "UPDATE bid_log SET last_bid=$tawar WHERE user_id=$idU AND bid_order_id=$idProduk");
        }
        $update = mysqli_query($db_con, "UPDATE bid_order SET current_bid=$tawar WHERE bid_order_id=$idProduk");
        if ($update) {
            echo "<script>alert('Tawaran Anda Berhasil Diajukan!')</script>";
        } else {
            echo "<script>alert('Galat!')</script>";
        }
    } else {
        echo "<script>alert('Tawaran Anda Tidak Boleh Di Bawah Harga Tawaran Sementara!')</script>";
    }
    echo "<meta http-equiv='refresh' content='0'>";
}
