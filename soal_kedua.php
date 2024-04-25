<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h2>Masukkan Teks dan Pola</h2>
    <form id="myForm">
        Masukkan teks: <input type="text" id="text"><br>
        Masukkan pola: <input type="text" id="pattern"><br>
        <input type="button" value="Hitung" onclick="hitungPola()">
    </form>
    <div id="result"></div>

    <script>
        function hitungPola() {
            var text = document.getElementById("text").value;
            var pattern = document.getElementById("pattern").value;
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send("text=" + text + "&pattern=" + pattern);
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function pattern_count($text, $pattern) {
            $count = 0;
            $text_length = strlen($text);
            $pattern_length = strlen($pattern);

            for ($i = 0; $i < $text_length - $pattern_length + 1; $i++) {
                $match = true;
                for ($j = 0; $j < $pattern_length; $j++) {
                    if ($text[$i + $j] != $pattern[$j]) {
                        $match = false;
                        break;
                    }
                }
                if ($match) {
                    $count++;
                }
            }

            return $count;
        }

        $text = $_POST['text'];
        $pattern = $_POST['pattern'];

        echo "Jumlah pola dalam teks: " . pattern_count($text, $pattern);
    }
    ?>
</body>
</html>
