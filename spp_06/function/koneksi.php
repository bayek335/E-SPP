<?php

$koneksi = mysqli_connect(hostname, username, password, database);

if (mysqli_connect_errno($koneksi)) {
    echo "<script>
    alert('" . mysqli_connect_error($koneksi) . "')
    </script>";
}
return true;
