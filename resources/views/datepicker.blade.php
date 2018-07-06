<!DOCTYPE html>
<html>
<head>
    <title>Datepicker</title>

    <!-- Jquery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>    

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

                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $('.datepicker').datepicker({
        startView: 0,
        todayBtn: "linked",
        orientation: "top auto",
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        multidate: true,
        multidateSeparator: "-",
        calendarWeeks: true        
    });

    $('.input-daterange').datepicker({
        startView: 0,
        todayBtn: "linked",
        orientation: "top auto",
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        multidate: true,
        multidateSeparator: "-",
        calendarWeeks: true        
    });    
</script>

</body>
</html>