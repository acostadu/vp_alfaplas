<meta name="_token" content="{!! csrf_token() !!}" />

<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery 2.2.3-->
<script type="text/javascript" src="{{ asset('plugins/jquery-2.2.3.min.js') }}"></script>

<!-- Moment-->
<script type="text/javascript" src="{{ asset('plugins/moment.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('plugins/jquery.slimscroll.js') }}" type="text/javascript"></script>

<!-- FastClick -->
<script src="{{asset('plugins/fastclick.min.js') }}" type="text/javascript"></script>

<!-- ChartJS -->
<script src="{{ asset('plugins/Chart.min.js') }}" type="text/javascript"></script>

<!-- DatePicker -->
<script src="{{asset('plugins/bootstrap-datepicker.js')}}"></script>
<!-- Languaje DatePicker-->
<script src="{{asset('plugins/bootstrap-datepicker.es.js')}}"></script>

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->

<!-- DateRangePicker -->
<script src="{{ asset('plugins/daterangepicker.js') }}" type="text/javascript"></script>

<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

