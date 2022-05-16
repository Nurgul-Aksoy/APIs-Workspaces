@extends('master.admin')
@section('content')
    <h4><i class="fa fa-solid fa-list-ul nav-icon"> Endpoint Listesi</i></h4><br>


    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Endpoint Listesi</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Ara">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 5%">Endpoint ID</th>
                            <th style="width: 5%">Url</th>
                            <th style="width: 5%" >Name</th>
                            <th style="width: 5%">Type</th>
                            <th style="width: 5%">Category</th>
                            <th style="width: 5%">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($endpoints as $data)
                                <td style="width: 5%">{{$data->id}}</td>
                                <td style="width: 5%">{{$data->url}}</td>
                                <td style="width: 5%">{{$data->name}}</td>
                                <td style="width: 5%">{{$data->type}}</td>
                                <td style="width: 5%">{{$category_names[$data->category]}}</td>
                                <td style="width: 5%">{{$data->description}}</td>
                                <td><a href="">Düzenle | Sil</a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- /.row -->
@endsection
