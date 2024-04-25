<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hitung dan Urutkan Huruf</title>
    </head>
<body>

<h2>Masukkan String:</h2>
<form id="inputForm">
  <input type="text" id="inputText" name="inputText">
  <button type="submit">Hitung</button>
</form>

<div id="result"></div>

<script>
    document.getElementById('inputForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let input = document.getElementById('inputText').value;
        let output = hitungDanUrutkanHuruf(input);
        displayResult(output);
    });

    function hitungDanUrutkanHuruf(input) {
        let counts = {};
        for (let i = 0; i < input.length; i++) {
            let char = input[i];
            if (char !== ' ') {
                counts[char] = (counts[char] || 0) + 1;
            }
        }

        let sortedCounts = Object.entries(counts).sort((a, b) => {
            let letterA = a[0].toLowerCase();
            let letterB = b[0].toLowerCase();

            if (letterA < letterB) return -1;
            if (letterA > letterB) return 1; 
            return 0;
        });

        let result = sortedCounts.map(([letter, count]) => {
            return `"${letter}":${count}`;
        });

        return `[${result.join(', ')}]`;
    }

    function displayResult(result) {
        let outputDiv = document.getElementById('result');
        outputDiv.innerHTML = "<h2>Hasil:</h2>";
        outputDiv.innerHTML += "<p>" + result + "</p>";
    }
</script>

</body>
</html>
