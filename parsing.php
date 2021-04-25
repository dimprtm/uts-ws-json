<?php
    //MENAMPILKAN DATA XML KE HTML
    $datajson = file_get_contents('datamerpati.json');

    // MENDECODE FILE .json
    $data = json_decode($datajson, true);

    // MEMBACA ARRAY DENGAN FOREACH
    echo "<h3>Data Burung Merpatiku (JSON)</h3>";
    foreach ($data as $d) {
        echo "Nama Burung : ".$d['nama']. "<br>";
        echo "Umur : " .$d['umur']. " Tahun <br>";
        echo "Warna : " .$d['warna']. "<br>";
        echo "Trah : " .$d['trah']. "<hr>";
    }
    echo "<a href='index.php'>Kembali ke Form</a>";

?>