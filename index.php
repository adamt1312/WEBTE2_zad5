<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 5 - SSE</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid container">

    <h1 style="font-family: 'Encode Sans Expanded', sans-serif; font-size: 110px;font-weight: bold">WEBTE2 - SSE</h1>

    <hr style="width: 75%; height: 2px; background-color: black; margin: 55px">
    <form class="form" method="post" action="handlePost.php" style="font-size: 20px; font-family: 'Encode Sans Expanded', sans-serif">
        <div class="checkbox_wrapper">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="sinus" value="Yes" checked>
                <label class="form-check-label" for="sinus">sin^2 (ax)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cosinus" value="Yes" checked>
                <label class="form-check-label" for="cosinus">cos^2 (ax)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="sincos" value="Yes" checked>
                <label class="form-check-label" for="sincos">sin (ax) * cos (ax)</label>
            </div>
        </div>
        <div class="input_wrapper">
            <input class="form-control" type="text" placeholder="Type constant 'a' here" aria-label="default input example" name="var_a">
            <button type="submit" class="btn btn-primary"><b>POST</b></button>
        </div>
    </form>
    <div class="results_wrapper" id="result">
        <div class="math">SINUS^2 (ax)</div>
        <div class="math">COSINUS^2 (ax)</div>
        <div class="math">SINUS*COSINUS (ax)</div>
        <div class="math" id="sinResult" style="font-size: 20px; font-weight: bold"></div>
        <div class="math" id="cosResult" style="font-size: 20px; font-weight: bold"></div>
        <div class="math" id="sincosResult" style="font-size: 20px; font-weight: bold"></div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'handlePost.php',
                data: $('form').serialize(),
                success: function (response) {
                    console.log(response);
                }
            });
        });
    });

    if(typeof(EventSource) !== "undefined") {
        let source = new EventSource("https://wt156.fei.stuba.sk/sse/sse.php");
        source.addEventListener("event", (e) => {
            let data = JSON.parse(e.data);
            console.log(data);
            if (data.sinuss == null) {
                var y1 = null;
            }
            else { var y1 = parseFloat(data.sinuss); }

            if (data.cosinuss == null) {
                var y2 = null;
            }
            else { var y2 = parseFloat(data.cosinuss); }

            if (data.sinuscos == null) {
                var y3 = null;
            }
            else { var y3 = parseFloat(data.sinuscos); }

            document.getElementById('sinResult').innerHTML = y1;
            document.getElementById('cosResult').innerHTML = y2;
            document.getElementById('sincosResult').innerHTML = y3;
        });
    }
</script>
<div id="footer">Adam Trebichalský, 98014</div>
</body>
</html>