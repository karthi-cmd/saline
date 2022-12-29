<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Verification</title>
    <script src="./dist/js/html5-qrcode.min.js"></script>
    <style>
        body 
        {
            background-color: grey;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container
        {
            display: table;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="width: 500px;" id="reader"></div>
    </div>
</body>
<script>
function onScanSuccess(decodedText, decodedResult) {
    window.location.href=decodedText;
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
</script>
</html>