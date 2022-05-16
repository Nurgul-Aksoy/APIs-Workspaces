<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border-right: 1px solid #ced4da;">
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="input-group input-group-sm">
                <select name="" class="form-control" style="border-right: 1px solid #ced4da;">
                 @foreach($categorylist as $n)
                        <option value="">{{$n->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($alldata as $al=>$key)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-solid fa-folder nav-icon"></i>
                        <p>
                            {{$al}}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @foreach($key as $k=>$i)
                        <li class="nav-item">
                            <a href="/service/{{$i['_id']}}" class="nav-link">
                                <i class="fa fa-solid fa-list-ul nav-icon"></i>
                                    <p>{{$k}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                </li>
                    @endforeach
                </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><!--

