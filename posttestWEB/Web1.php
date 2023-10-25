<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // File upload directory
    $targetDirectory = "uploads/";

    if (isset($_POST["model"]) && isset($_POST["harga"]) && isset($_FILES["file"])) {
        $model = $_POST["model"];
        $harga = $_POST["harga"];
        $uploadedFile = $_FILES["file"]["name"];
        
        // Perform file type validation if necessary
        $fileExtension = pathinfo($uploadedFile, PATHINFO_EXTENSION);
        $newFileName = date("Y-m-d") . " " . basename($uploadedFile, "." . $fileExtension) . "." . $fileExtension;

        $targetPath = $targetDirectory . $newFileName;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
            echo "File berhasil diunggah dengan nama: " . $newFileName;
            
            // Selanjutnya, Anda dapat menyimpan data ke database jika diperlukan.
            // Misalnya, Anda dapat menggunakan PDO untuk koneksi ke database MySQL.
            // Lakukan operasi penyimpanan data ke database di sini.
        } else {
            echo "Error saat mengunggah file.";
        }
    } else {
        echo "Model, harga, dan file harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Website Mobil Porsche</title>
    <!-- Your CSS styles go here -->
    <style>
        h3 {
            background-color: #520b4c;
            color: #fff;
            padding: 10px;
        }

        form {
            background-color: #f14e95;
            padding: 30px;
            width: 300px;
            margin: 30px auto;
            border-radius: 10pxpx;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>List Mobil Porsche</h1>
        <p><?php echo date('l, d F Y'); ?></p>
        <button id="aa-button">Light/Dark</button>
    </header>

    <ul>
        <li><a class="active" href="Web1.php">Home</a></li>
        <li><a href="boutme.html">About Me</a></li>
        <li><a class="hero" href="listdatabase.php">REQ MOBIL</a></li>
    </ul>

    <h2>Selamat datang di List Mobil Porsche</h2>
    <p>Kami Menglist Berbagai Jenis Mobil Porsche Dengan Bentuk Dan Type Yang Beragam</p>

    <!-- Tambahkan judul formulir di sini -->
    <h3>Tambahkan Request mobil yang ingin user tampilkan di next update</h3>
    <form action="add_car.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="model">Model Mobil Porsche:</label>
            <input type="text" id="model" name="model" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga Mobil (Rp):</label>
            <input type="number" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="file">Pilih File Gambar:</label>
            <input type="file" id="file" name="file" accept="image/*" required>
        </div>
        <button type="submit">Tambahkan Mobil</button>
    </form>

    <!-- Tampilkan daftar mobil Porsche dari database di sini -->
    <h3>List Mobil</h3>

    <ul>
        <li>
            <img class="gambar" src="P911.jpg" alt="Mobil 1" width="800px">
            <h4 class="clr">Porsche 911 GT3 PDK</h4>
            <p class="clr">Porsche 911 GT3 PDK adalah 2 seater Coupe yang tersedia seharga Rp 4 Milyar di Indonesia. <br>
                Mobil ini tersedia dalam 15 warna dan Otomatis opsi transmisi di Indonesia. <br>
                Mobil ini memiliki ground clearance 137 mm dengan dimensi sebagai berikut: <br>
                4545 mm L x 1852 mm W x 1269 mm H. Kompetitor terdekat 911 GT3 PDK adalah <br>
                GranTurismo MC Stradale V8, AMG GT 53 4Matic+ 4 Door Coupe, Taycan Turbo dan GLE-Class 53 4Matic + Coupe.</p>
            <p class="clr"><b>Harga: Rp 4.000.000.000</b></p>
        </li>
        <br>
        <li>
            <img class="gambar" src="PTaycan.jpg" alt="Mobil 2" width="800px">
            <h4 class="clr">Porsche Taycan</h4>
            <p class="clr">Porsche Taycan 2023 adalah 4 dan 5 Seater Wagon yang tersedia dalam daftar harga Rp 2,85 Milyar di Indonesia. <br>
                Mobil ini memiliki ground clearance 148 mm dengan dimensi sebagai berikut: 4963 mm L x 2144 mm W x 1379 mm H. <br>
                Pesaing terdekat Porsche Taycan adalah BRZ, TT Coupe, 718 dan A5.</p>
            <p class="clr"><b>Harga: Rp 2.850.000.000</b></p>
        </li>
        <br>
        <li>
            <img class="gambar" src="PPanameraa.jpg" alt="Mobil 3" width="800px">
            <h4 class="clr">Porsche Panamera</h4>
            <p class="clr">Porsche Panamera 2023 adalah 4 Seater Sedan yang tersedia dalam daftar harga Rp 2,2 - 3,9 Milyar di Indonesia. <br>
                Ini tersedia dalam 16 warna, 12 varian, 5 pilihan mesin, dan 1 opsi transmisi: Otomatis di Indonesia. Dimensi Panamera adalah 5015 mm <br> L x 1931 mm W x 1418 mm H. 
                Pesaing terdekat Porsche Panamera adalah EQS, A7, 7 Series Sedan dan Ghibli.</p>
            <p class="clr"><b>Harga: Rp 2.200.000.000 - 3.900.000.000</b></p>
        </li>
        <br>
        <li>
            <img class="gambar" src="P911Dakar.jpg" alt="Mobil 4" width="800px">
            <h4 class="clr">Porsche 911 Dakar</h4>
            <p class="clr">Mobil yang Anda lihat di sini, bagaimanapun, bukan konversi. Ini adalah Porsche 911 Dakar 2023, memiliki ground clearance tinggi <br>
                dengan suspensi besar dan punya ban segala medan yang langsung dari pabrik. Model ini akan menjadi langka, karena hanya 2.500 <br> 
                yang diproduksi di seluruh dunia.</p>
            <p class="clr"><b>Harga: Rp 10.000.000.000</b></p>
        </li>
        <br>
        <li>
            <img class="gambar" src="P718.jpg" alt="Mobil 5" width="800px">
            <h4 class="clr">Porsche 718</h4>
            <p class="clr">Porsche 718 2023 adalah 2 Seater Coupe yang tersedia dalam daftar harga Rp 1,5 - 2,5 Milyar (Comming Soon) di Indonesia. <br>
                Ini tersedia dalam 16 warna, 13 varian, 4 pilihan mesin, dan 2 opsi transmisi: Otomatis dan Manual di Indonesia. <br>
                Dimensi 718 adalah 4379 mm L x 1801 mm W x 1295 mm H. Pesaing terdekat Porsche 718 adalah BRZ, TT Coupe, A5 dan GLC-Class.</p>
            <p><b class="clr">Harga: Rp 1.500.000.000 - 2.500.000.000</b></p>
        </li>
    </ul>
    
    <footer>
        <p>Copyright &copy; <?php echo date('Y'); ?> List Mobil Porsche By Rangga</p>
    </footer>
</body>
</html>
