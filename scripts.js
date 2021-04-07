function graphPlot () {

    // if (1 != null)
    // {
    //     return;
    // }
    GRAPH = document.getElementById('plot');    
        var layout = 
        {
            width: 500,
            height: 500,
            title: 'GRAF',
            showlegend: false,
            font: {
                family: "Nanum  Gothic",
                size: 16
            },
            xaxis: {
                title: 'X',
                showgrid: false,
                zeroline: false,
            },
            yaxis: {
                title: 'Y',
                showline: false
            },
        };    
        Plotly.plot(GRAPH, [{
        y: [0],
        name: 'Sin',
        mode: 'lines+markers', 
        marker: {color: '#FF9775', size: 8},
        line: {
            width: 4,
            shape: 'spline',
            color: '#ff9933',
            smoothing: 1.3,
            visible: true
        }},
        {
        y: [1],
        name: 'Cos',
        mode: 'lines+markers',
        marker: {color: '#00C3FF', size:8},
        line: {
            width: 4,
            shape: 'spline',
            color: '#00C3FF',
            smoothing: 1.3,
            visible: true
        }},
        {
        y: [0],
        name: 'Sin*Cos',
        mode: 'lines+markers',
        marker: {color: 'red', size: 8},
        line: {
            width: 4,
            shape: 'spline',
            color: 'red',
            smoothing: 1.3,
            visible: true
        }}], layout);


        if(typeof(EventSource) !== "undefined") {
            let source = new EventSource("https://wt158.fei.stuba.sk/zad5/sse.php");
            cnt = 0;
            source.addEventListener("event",handler);
        }
}


var handler = function(e){
        let data = JSON.parse(e.data);
        var y1 = parseFloat(data.sinus);
        var y2 = parseFloat(data.cosinus);
        var y3 = parseFloat(data.sinuscosinus);

        console.log(y1, y2, y3);

        if(cnt > 20) {
            Plotly.relayout(GRAPH,{xaxis: {range: [cnt-20,cnt]}},10);
        }
        cnt++;
        Plotly.extendTraces(GRAPH,{y: [[y1], [y2], [y3]]}, [0, 1, 2]);
}  


// function stop_btn () {
//     source.removeEventListener("message",handler);
// }


function hideTrace() {
    var checkbox1 = $( "#cb_1" )[ 0 ];
    var checkbox2 = $( "#cb_2" )[ 0 ];
    var checkbox3 = $( "#cb_9" )[ 0 ];

    //1 0 0
    if (checkbox1.checked == true && checkbox2.checked == false && checkbox3.checked == false)
        var update = {
            visible: [true, false, false]
        };
    //0 0 0
    else if (checkbox1.checked == false && checkbox2.checked == false && checkbox3.checked == false)
        var update = {
            visible: [false, false, false]
        };
    //0 1 0
    else if (checkbox1.checked == false && checkbox2.checked == true && checkbox3.checked == false)
        var update = {
            visible: [false, true, false]
        };
    //0 1 1
    else if (checkbox1.checked == false && checkbox2.checked == true && checkbox3.checked == true)
        var update = {
            visible: [false, true, true]
        };
    //0 0 1
    else if (checkbox1.checked == false && checkbox2.checked == false && checkbox3.checked == true)
        var update = {
            visible: [false, false, true]
        };
    //1 0 1
    else if (checkbox1.checked == true && checkbox2.checked == false && checkbox3.checked == true)
        var update = {
            visible: [true, false, true]
        };
    //1 1 0
    else if (checkbox1.checked == true && checkbox2.checked == true && checkbox3.checked == false)
        var update = {
            visible: [true, true, false]
        };
    //1 1 1
    else if (checkbox1.checked == true && checkbox2.checked == true && checkbox3.checked == true)
        var update = {
            visible: [true, true, true]
        };
    Plotly.restyle(GRAPH, update, [0, 1, 2]);
}

function showHideSlider() {
    var slider = $('#myRange');
    var checkbox3 = $("#cb_3");    
    if (checkbox3.is(":checked")) {
        slider.css("visibility","visible");
    }
    else {
        slider.css("visibility","hidden");
    }
}

function showHideTextInput() {
    var textInput = $('#text_input');
    var checkbox4 = $("#cb_4");
    if (checkbox4.is(":checked")) {
        textInput.css("visibility","visible");
    }
    else {
        textInput.css("visibility","hidden");
    }
}


function connect() {
    $("#text_input").val($("#myRange").val());
    $("#ampl").html($("#myRange").val());
}

function connect2() {
    $("#myRange").val($("#text_input").val());
    $("#ampl").html($("#myRange").val());
}

let request;
$("#form").submit(function(event){
    event.preventDefault();
    if (request) {
        request.abort();
    }
    let $form = $(this);
    let $inputs = $form.find("input, select, button, textarea");
    let serializedData = $form.serialize();

    $inputs.prop("disabled", true);

    request = $.ajax({
        url: "/sse.php",
        type: "post",
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR){
        console.log("Hooray, it worked!");
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    request.always(function () {
        $inputs.prop("disabled", false);
    });
});