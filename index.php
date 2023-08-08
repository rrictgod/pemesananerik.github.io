<!DOCTYPE html>
<html>

<head>
    <title>Form Pemesanan Nasi Kotak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            margin-top: 10px;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>Form Pemesanan Nasi Kotak</h1>
    <form method="post" action="">
        <label for="branch">Cabang:</label>
        <select name="branch" id="branch">
            <option value="pilih cabang">~Pilih Cabang</option>
            <option value="majalengka">Majalengka</option>
            <option value="kuningan">Kuningan</option>
            <option value="cirebon">Cirebon</option>
        </select>
        <label for="name">Nama Pelanggan:</label>
        <input type="text" name="nama" id="nama" required>
        <label for="phoneNumber">No. HP:</label>
        <input type="text" name="notelp" id="notelp" required>
        <label for="quantity">Jumlah Pesanan:</label>
        <input type="text" name="jumlah" id="jumlah" required>
        <input type="submit" name="simpan" value="Pesan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $branch = $_POST['branch'];
        $name = $_POST['nama'];
        $phoneNumber = $_POST['notelp'];
        $quantity = $_POST['jumlah'];
        $pricePerItem = 50000; // Harga satuannya (50 ribu)
        $discountPerItem = 50000; // Diskon per item jika lebih dari 10 pesanan
        $minimumQuantityForDiscount = 10; // Jumlah pesanan minimal untuk mendapat diskon

        $totalPriceBeforeDiscount = $pricePerItem * $quantity;
        $totalDiscount = 0;

        if ($quantity > $minimumQuantityForDiscount) {
            $totalDiscount = $discountPerItem * floor($quantity / $minimumQuantityForDiscount);
        }

        $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;

        echo "<div class='result'>";
        echo "<strong>Pesanan telah diterima:</strong><br>";
        echo "<strong>Cabang:</strong> " . $branch . "<br>";
        echo "<strong>Nama:</strong> " . $name . "<br>";
        echo "<strong>No. HP:</strong> " . $phoneNumber . "<br>";
        echo "<strong>Jumlah:</strong> " . $quantity . "<br>";
        echo "<strong>Tagihan Awal Sebelum Diskon:</strong> Rp " . number_format($totalPriceBeforeDiscount, 0, ',', '.') . "<br>";

        if ($totalDiscount > 0) {
            echo "<strong>Diskon:</strong> Rp " . number_format($totalDiscount, 0, ',', '.') . "<br>";
        }

        echo "<strong>Tagihan Akhir Setelah Diskon:</strong> Rp " . number_format($totalPriceAfterDiscount, 0, ',', '.') . "<br>";
        echo "</div>";
    }
    ?>
</body>

</html>