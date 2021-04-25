<!DOCTYPE html>  
<html>  
    <head>  
        <title>UTS WS - JSON</title>  
    </head>  
    <body>
        <h3>Input Data</h3>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" id="id"></input></td>
                </tr>
                <tr>
                    <td>Nama Burung</td>
                    <td><input type="text" name="nama" id="nama"></input></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="number" name="umur" id="umur"></input></td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td><input type="text" name="warna" id="warna"></input></td>
                </tr>
                <tr>
                    <td>Trah</td>
                    <td><input type="text" name="trah" id="trah"></input></td>
                </tr>
                <tr>
                    <td><a href="parsing.php">Lihat Data</a></td>
                    <td><input type="submit" name="submit" id="submit" value="Kirim"></input></td>
                </tr>

            </table>
        </form>
            <?php
            // KONEKSI KE DATABASE
            $conn = mysqli_connect("localhost", "root", "", "ws_uts") 
            or die("Error ".mysqli_error($conn));

            // MENGAMBIL DATA DARI INPUT FORM
            $id=isset($_POST["id"]) ? $_POST["id"] : "";
            $nama=isset($_POST["nama"]) ? $_POST["nama"] : "";
            $umur=isset($_POST["umur"]) ? $_POST["umur"] : "";
            $warna=isset($_POST["warna"]) ? $_POST["warna"] : "";
            $trah=isset($_POST["trah"]) ? $_POST["trah"] : "";

            // MEMASUKKAN DATA KE DATABASE
            if ($id != '') {
                $query = "INSERT INTO tb_datajson(id, nama, umur, warna, trah)
                        VALUES ('$id', '$nama', '$umur', '$warna', '$trah')";
                mysqli_query($conn, $query);
                echo "Data dengan nama burung <b>$nama</b> telah tersimpan.";
            }
            else {
            }
            
            // MEMASUKKAN DATA KE DATABASE
            $query = "SELECT * FROM tb_datajson";  
            $result = mysqli_query($conn, $query);  
            $json_array = array();  
            while($row = mysqli_fetch_assoc($result))  
            {  
                $json_array[] = $row;
            }

            // MENYIMPAN DATA KEDALAM BENTUK FILE .json
            $json_file = json_encode($json_array, JSON_PRETTY_PRINT);
            file_put_contents('datamerpati.json', $json_file);
            ?>  
    </body>  
</html>  
