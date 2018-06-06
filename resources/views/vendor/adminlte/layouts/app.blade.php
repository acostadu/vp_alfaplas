<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app" v-cloak>
        <div class="wrapper">

            @include('adminlte::layouts.partials.mainheader')

            @include('adminlte::layouts.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @include('adminlte::layouts.partials.contentheader')

                <!-- Main content -->
                <section class="content">

                    <div id="principalPanel">
                        <!-- Your Page Content Here -->
                        @section('main-content')

                        @show
                    </div>

                    <div id="windowsModal">
                        <!-- Your Window Modal Here -->
                        @section('window-modal')

                        @show
                    </div>

                </section><!-- /.content -->                

            </div><!-- /.content-wrapper -->

            @include('adminlte::layouts.partials.controlsidebar')

            @include('adminlte::layouts.partials.footer')

        </div><!-- ./wrapper -->
    </div>

    @section('scripts')
        @include('adminlte::layouts.partials.scripts')
    @show   

    <div class="load"></div>

    <div id="spinner" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 48px">
                <!-- <span class="fa fa-spinner fa-spin fa-3x"></span> -->
            </div>
        </div>
    </div>    

</body>
</html>