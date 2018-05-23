@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="content">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Inicio</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
				<!-- Inicio de las cajas Enero - Febrero - Marzo - Abril -->
				<div class="row">
					<div class="col-lg-3 col-xs-6">				
					  <!-- small box -->
					  <div class="small-box bg-aqua">
					    <div class="inner">
					      <h3>150</h3>

					      <p>Enero</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-bag"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
					    <div class="inner">
					      <h3>53<sup style="font-size: 20px">%</sup></h3>

					      <p>Febrero</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-stats-bars"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-yellow">
					    <div class="inner">
					      <h3>44</h3>

					      <p>Marzo</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-person-add"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
					    <div class="inner">
					      <h3>65</h3>

					      <p>Abril</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-pie-graph"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
				</div>

				<!-- Inicio de las cajas Mayo - Junio - Julio - Agosto -->
				<div class="row">
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-aqua">
					    <div class="inner">
					      <h3>150</h3>

					      <p>Mayo</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-bag"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
					    <div class="inner">
					      <h3>53<sup style="font-size: 20px">%</sup></h3>

					      <p>Junio</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-stats-bars"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-yellow">
					    <div class="inner">
					      <h3>44</h3>

					      <p>Julio</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-person-add"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
					    <div class="inner">
					      <h3>65</h3>

					      <p>Agosto</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-pie-graph"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
				</div>

				<!-- Inicio de las cajas Septiembre - Octubre - Noviembre - Diciembre -->
				<div class="row">
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-purple">
					    <div class="inner">
					      <h3>150</h3>

					      <p>Septiembre</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-bag"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-black">
					    <div class="inner">
					      <h3>53<sup style="font-size: 20px">%</sup></h3>

					      <p>Octubre</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-stats-bars"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-yellow">
					    <div class="inner">
					      <h3>44</h3>

					      <p>Noviembre</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-person-add"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
					    <div class="inner">
					      <h3>65</h3>

					      <p>Diciembre</p>
					    </div>
					    <div class="icon">
					      <i class="ion ion-pie-graph"></i>
					    </div>
					    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->    	
    </section>
    <!-- /.content -->

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    
@endsection
