<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WEBTE - Zadanie 6.</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@800;900&family=Nanum+Gothic:wght@800&display=swap" rel="stylesheet">
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--        <script-->
<!--                src="https://code.jquery.com/jquery-3.6.0.js"-->
<!--                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="-->
<!--                crossorigin="anonymous"></script>-->
<!--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
<!--        <script src="plotly-latest.min.js"></script>-->
<!--        <script src="scripts.js"></script>-->
    </head>


    <body>
        <div class="parent">
            <div id="bg1">
                <span id="sp_1">WEBTE</span>
            </div>
            <div id="bg2">
                <span id="sp_2">ZADANIE 6</span>
            </div>
        </div>


        <form id="form">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="sinus" id="cb_1" onclick="hideTrace()" checked>
                <label class="custom-control-label" for="cb_1">SINUS</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="cosinus" id="cb_2" onclick="hideTrace()" checked>
                <label class="custom-control-label" for="cb_2">COSINUS</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="sincos" id="cb_9" onclick="hideTrace()" checked>
                <label class="custom-control-label" for="cb_9">SIN*COS</label>
            </div>


            <div id="line"></div>

            <div id="amplitude_container_bg"></div>
            <div class="amplitude_container">

                <h3>Zmeň amplitúdu</h3>
                <h4>Aktuálna hodnota je:</h4>
                <div id="ampl">1</div><br>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="slider" id="cb_3" onclick="showHideSlider()">
                    <label class="custom-control-label" for="cb_3">SLIDER</label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="text" id="cb_4" onclick="showHideTextInput()">
                    <label class="custom-control-label" for="cb_4">TEXT</label>
                </div>
                <br>
                <input type="range" min="0" max="5" value="1" step="0.5" class="slider" id="myRange" name="var_a" oninput="connect()">
                <input type="number" min="0" max="5" value="1" step="0.5" class="input_number" id="text_input" name="var_a" oninput="connect2()">
                <br>

                <button type="submit" class="btn btn-dark" id="btn" style="font-family: 'Courier New'; margin: 35px;"><b>POST</b></button>
            </div>
        </form>

<!--        <div id="graph_wrapper">-->
<!--            <div id="plot" style="width:630px;height:850px;">-->
<!--                <form id="form">-->
<!--                    <div class="custom-control custom-checkbox">-->
<!--                        <input type="checkbox" class="custom-control-input" name="sinus" id="cb_1" onclick="hideTrace()" checked>-->
<!--                        <label class="custom-control-label" for="cb_1">SINUS</label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="custom-control custom-checkbox">-->
<!--                        <input type="checkbox" class="custom-control-input" name="cosinus" id="cb_2" onclick="hideTrace()" checked>-->
<!--                        <label class="custom-control-label" for="cb_2">COSINUS</label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="custom-control custom-checkbox">-->
<!--                        <input type="checkbox" class="custom-control-input" name="sincos" id="cb_9" onclick="hideTrace()" checked>-->
<!--                        <label class="custom-control-label" for="cb_9">SIN*COS</label>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div id="line"></div>-->
<!---->
<!--                    <div id="amplitude_container_bg"></div>-->
<!--                    <div class="amplitude_container">-->
<!---->
<!--                        <h3>Zmeň amplitúdu</h3>-->
<!--                        <h4>Aktuálna hodnota je:</h4>-->
<!--                        <div id="ampl">1</div><br>-->
<!---->
<!--                        <div class="custom-control custom-checkbox">-->
<!--                            <input type="checkbox" class="custom-control-input" name="slider" id="cb_3" onclick="showHideSlider()">-->
<!--                            <label class="custom-control-label" for="cb_3">SLIDER</label>-->
<!--                        </div>-->
<!---->
<!--                        <div class="custom-control custom-checkbox">-->
<!--                            <input type="checkbox" class="custom-control-input" name="text" id="cb_4" onclick="showHideTextInput()">-->
<!--                            <label class="custom-control-label" for="cb_4">TEXT</label>-->
<!--                        </div>-->
<!--                        <br>-->
<!--                        <input type="range" min="0" max="5" value="1" step="0.5" class="slider" id="myRange" name="var_a" oninput="connect()">-->
<!--                        <input type="number" min="0" max="5" value="1" step="0.5" class="input_number" id="text_input" name="var_a" oninput="connect2()">-->
<!--                        <br>-->
<!---->
<!--                        <button type="submit" class="btn btn-dark" id="btn" style="font-family: 'Courier New'; margin: 35px;"><b>POST</b></button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--        <script>-->
<!--            graphPlot();-->
<!--        </script>-->
    </body>
</html>