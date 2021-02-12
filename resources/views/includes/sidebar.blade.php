    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"><i class
                            ="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Barang</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{route('alternatif.index')}}"> <i class="menu-icon fa fa-list"></i>Alternatif</a>
                    </li>
                    <li class="">
                        <a href="{{ route('kriteria.index') }}"> <i class="menu-icon fa fa-list"></i>Kriteria</a>
                    </li>
                    <li class="">
                        <a href="{{ route('sub.index') }}"> <i class="menu-icon fa fa-list "></i>Sub Kriteria</a>
                    </li>
                    <li class="">
                        <a href="{{ route('relasi.index') }}"> <i class="menu-icon fa fa-list "></i>Penilaian</a>
                    </li>
                    <li class="">
                        <a href="{{ route('perhitungan.index') }}"> <i class="menu-icon fa fa-plus"></i>Hitung</a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->