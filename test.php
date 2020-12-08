<?php
// mengambil 6 karakter dari depan (Fungsi)
echo"
<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Fungsi PHP untuk mengambil karakter Left, Mid dan Right</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
    </head>
    <body>
        <div class='container' style='margin-top:50px'>";
            $kalimat = "Dis Cintas PHP untuk mengambil karakter Left, Mid dan Right";
            $left = substr($kalimat, 0, 6);
            echo "<strong>Kalimat awal :</strong> $kalimat<br>";
            echo "<strong>Hasil substr(";?>$kalimat<?php echo", 0, 6) :</strong> $left
        </div>
    </body>
</html>
";
?>