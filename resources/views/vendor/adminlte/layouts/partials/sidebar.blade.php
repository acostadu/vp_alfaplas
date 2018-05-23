<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header">{{ trans('adminlte_lang::message.header') }}</li> -->
            <!-- Optionally, you can add icons to the links -->
            <!-- 
            <li class="active">
                <a href="{{ url('home') }}">
                    <i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span>
                </a>
            </li>
             -->
            <li class="treeview">
                <a href="#"><i class='fa fa-cart-arrow-down'></i> <span>Compras</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-pie-chart'></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-cogs'></i> <span>Producción</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-folder'></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-truck'></i> <span>Hoja de Ruta</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>{{ trans('adminlte_lang::message.linklevel2') }}</a></li>                    
                </ul>
            </li>                        
            <li class="treeview">
                <a href="#"><i class='fa fa-table'></i> <span>Visor</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> <span>Comercial</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-line-chart"></i>Ventas</a></li>
                            <li><a href="#"><i class="fa fa-percent"></i>Comisiones</a></li>
                            <li><a href="#"><i class="fa fa-pencil-square-o"></i>Pendientes</a></li>
                        </ul>            
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Vendedores</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Administración</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Producción</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Adquisición</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Recursos Humanos</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> <span>Presupuestos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-line-chart"></i>Ventas</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i>Producción</a></li>
                        </ul>                         
                    </li>
                </ul>
            </li>         
            <li><a href="#"><i class='fa fa-wrench'></i> <span>Herramientas</span></a></li>
            <li><a href="#"><i class='fa fa-sitemap'></i> <span>Configuración</span></a></li>            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
