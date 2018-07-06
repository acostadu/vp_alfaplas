<!DOCTYPE html>
<html>
<head>
    <title>Datepicker</title>   

<!-- <script src="{{asset('plugins/bootstrap-datepicker.js')}}"></script> -->
<script type="text/javascript" src="{{ asset('plugins/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/moment.js') }}"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <!-- Datepicker Files -->
<link rel="stylesheet" href="{{asset('plugins/datepicker3.css')}}">
<!-- <link rel="stylesheet" href="{{asset('plugins/bootstrap-standalone.css')}}"> -->
<script src="{{asset('plugins/bootstrap-datepicker.js')}}"></script>
<!-- Languaje -->
<script src="{{asset('plugins/bootstrap-datepicker.es.js')}}"></script>

<script type="text/javascript" src="{{ asset('plugins/daterangepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker.css') }}" />

</head>
<body>
<div class="container">
    <div class="content">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4 col-md-offset-4">

                    <form action="/test/save" method="post">

                        <div class="input-group date">
                          <input type="text" class="form-control datepicker" name="date">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>                        
                       
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control datepicker" name="date">

                        <br/>

                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start" />
                                <span class="input-group-addon">to</span>
                             <input type="text" class="input-sm form-control" name="end" />
                        </div>

                        <br/>

                        <!-- <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" /> -->
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div>
                            <input class="form-control" value="" id="daterange" readonly="" type="text">

                        </div>                                                

                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    //$(function() {
        //load(1);
        
        //Date range picker
        //$('#daterange').daterangepicker();
        
        $('#daterange').daterangepicker({
            "ranges": {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
                'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                'Último Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },            
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizado",
                "calendarWeeks": true,
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "linkedCalendars": false,
            "autoUpdateInput": true,
            "opens": "right",
            "alwaysShowCalendars": true,
            "startDate": "27/06/2018",
            "endDate": "07/03/2018"            
        });
    //});

    function load(page) {
        var range=$("#range").val();
        var sale_by=$("#sale_by").val();
        var parametros = {"action":"ajax","page":page,'range':range,'sale_by':sale_by};
        $("#loader").fadeIn('slow');
        $.ajax({
            url:'./ajax/reporte_ventas_ajax.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader").html("<img src='./img/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }
</script>

<script>
    /*$(function() {



$('input[name="daterange"]').daterangepicker({
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
        ],
        "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        "firstDay": 1
    },
    "startDate": "06/27/2018",
    "endDate": "07/03/2018"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});      
    });
    //$('#range').daterangepicker();
    /*$('.datepicker').datepicker({
        startView: 0,
        todayBtn: "linked",
        orientation: "top auto",
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        multidate: true,
        multidateSeparator: "-",
        calendarWeeks: true        
    });*/

    /*$('.input-daterange').datepicker({
        startView: 0,
        todayBtn: "linked",
        orientation: "top auto",
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        multidate: true,
        multidateSeparator: "-",
        calendarWeeks: true        
    });*/    
</script>



</body>
</html>