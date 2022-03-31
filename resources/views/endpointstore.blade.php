@extends('master.admin')
@section('content')
    <h4><i class="fa fa-solid fa-list-ul nav-icon"> Endpoint Ekle</i></h4><br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Endpoint</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url:</label>
                                    <input type="url" class="form-control" name="url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type:</label>
                                    <!--<input type="number" class="form-control" name="order" min="0" max="100">-->
                                    <select name="endpoint" id="endpoint" class="form-control">
                                        <option value=""></option>
                                        <option value="">GET</option>
                                        <option value="">POST</option>
                                        <option value="">PUT</option>
                                        <option value="">PATCH</option>
                                        <option value="">DELETE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name:</label>
                                    <input type="text" class="form-control" name="name" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Description:</label>
                                    <div class="input-group">
                                        <textarea  name="description" cols="64" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; "></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--Header-Param-Endpoint-->
                <div class="col-12 col-sm-6">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Param</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Endpoint</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body" style="padding:0px 0px 0px 0px;">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <!--Haeder table -->

                                        <div class="card-body" style="padding:0px;">
                                        <table class="table table-bordered">
                                            <thead>
                                            <!--yeni satir ekleme-->
                                            <button type="button" id="add-row" class="btn btn-block btn-default btn-xs" style="width: 25px; margin: 6px; float:right;  margin-right:16px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <tr>
                                                <th style="width:10px;">Key</th>
                                                <th style="width:20px;">Value</th>
                                                <th style="width:50px;">Description</th>
                                                <th style="width:4px;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="text" id="key" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><input type="text" id="value" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><textarea name="" id="description" cols="22" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                                <td><button type="button" id="remove-row" class="btn btn-block btn-default btn-xs disabled" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <!--Haeder table -->
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    Parameter content
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                   Endpoint Add
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        @include('sweetalert::alert')
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
