@extends('master.admin')
@section('content')

    <h4><i class="fa fa-solid fa-list-ul nav-icon"> Endpoint Ekle</i></h4><br>
    <div style="float: right; margin-top:-55px; margin-right:13px;">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
    </div>
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
                        <form action="{{ route('param') }}" method="post">
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
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="tab" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="tab" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Param</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body" style="padding:0px;">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <!--Haeder table -->

                                        <div class="card-body" style="padding:0px;">
                                        <table class="table table-bordered header">
                                            <thead>
                                            <!--yeni satir ekleme-->
                                            <button type="button" id="add-row" class="btn btn-block btn-default btn-xs" style="width: 25px; margin: 6px; float:right;  margin-right:16px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <tr>
                                                <th style="width:5px;">#</th>
                                                <th style="width:20px;">Key</th>
                                                <th style="width:20px;">Value</th>
                                                <th style="width:50px;">Description</th>
                                                <th style="width:4px;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="width:5px;">0.</td>
                                                <td><input type="text" id="key" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><input type="text" id="value" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><textarea name="" id="description" cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                                <td><button type="button" id="remove-row" class="btn btn-block btn-default btn-xs disabled" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <!--Haeder table -->
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <!--Haeder table -->
                                    <div class="card-body" style="padding:0px;">
                                        <table class="table table-bordered param">
                                            <thead>
                                            <!--yeni satir ekleme-->
                                            <button type="button" id="add-row-param" class="btn btn-block btn-default btn-xs" style="width: 25px; margin: 6px; float:right;  margin-right:16px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <tr>
                                                <th style="width:5px;">#</th>
                                                <th style="width:10px;">Key</th>
                                                <th style="width:20px;">Value</th>
                                                <th style="width:50px;">Description</th>
                                                <th style="width:4px;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="width:5px;">0.</td>
                                                <td><input type="text" id="key" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><input type="text" id="value" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><textarea name="" id="description" cols="19" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                                <td><button type="button" id="remove-row-param" class="btn btn-block btn-default btn-xs disabled remove_row_param" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
            </div>
        </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>
                            <div class="card-tools">
                                <div>
                                    <!--yeni satır ekleme-->
                                        <button type="button" id="add-row-field" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-default btn-xs" style="width: 25px; margin: 6px; float:right;  margin-right:15px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="padding:0px;">
                            <table class="table table-hover text-nowrap table-bordered field">
                                <!--Field table -->
                                        <thead>
                                        <tr><th style="width:10px;">Name</th>
                                            <th style="width:10px;">Key</th>
                                            <th style="width:20px;">Value</th>
                                            <th style="width:30px;">Type</th>
                                            <th style="width:50px;">Description</th>
                                            <th style="width:4px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr><td><input type="text" id="name" style="width: 150px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                            <td><input type="text" id="key" style="width: 150px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                            <td><input type="text" id="value" style="width: 150px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                             <td><select name="endpoint" id="type" style="width: 150px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;">
                                                     <option value=""></option>
                                                     <option value="">GET</option>
                                                     <option value="">POST</option>
                                                     <option value="">PUT</option>
                                                     <option value="">PATCH</option>
                                                     <option value="">DELETE</option>
                                                 </select></td>
                                            <td><textarea name="" id="description" cols="28" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                            <td><button type="button" id="remove-row-param" class="btn btn-block btn-default btn-xs disabled remove_row_field" style="width: 25px; margin:5px 5px 5px 20px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        @include('sweetalert::alert')
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!--Modal-->
    <div class="modal fade" id="field">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('param') }}" method="post" id="modalone">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Key:</label>
                                <input type="text" class="form-control" name="key">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Description:</label>
                                <div class="input-group">
                                    <textarea  name="description" cols="64" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; "></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!--modal 2-->
                            <select name="type" style="width: 420px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px; margin-left:20px;" id="modaltwo">
                                <option value="null" selected>Tür seçimi yapınız</option>
                                <option value="oneinput">Input</option>
                                <option value="twotextarea">Textarea</option>
                                <option value="threeselect">Select</option>
                                <option value="fourcheckbox">Checkbox</option>
                                <option value="fiveradio">Radio</option>
                            </select>
                            <!--select turler-->
                    <div class="contents" style="margin-left: 20px;">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="next" class="btn btn-primary">Next</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            var i=1;
            $("#add-row").click(function (){
                i++;
                var k=0;
                $(".header").append(
                    '<tr id="row'+ i +'" class="row_number">'+
                    '<td  style="width:5px;"></td>'+
                    '<td><input type="text" id="key" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><input type="text"  id="value" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><textarea name="" id="description" cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
                    '<td><button type="button" id="'+ i +'" class="btn btn-block btn-default btn-xs active remove_row" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                    '</tr>'
                );
                //auto row index number
                $('.header .row_number').each(function(k){
                    $(this).children("td:eq(0)").html(++k + ".");
                });
            });
            $(document).on('click','.remove_row',function (){
                var row_id=$(this).attr("id");
                $('#row'+row_id+'').remove();
                //eklenen tablo satiri silindikten sonra numralarin siralı halde kalmasi
                $('.header .row_number').each(function(k){
                    $(this).children("td:eq(0)").html(++k + ".");
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            var i=1;
            $("#add-row-param").click(function (){
                i++;
                var j=0;
                $(".param").append(
                    '<tr id="row'+ i +'" class="row_param">'+
                    '<td style="width:5px;"></td>'+
                    '<td><input type="text" id="key" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><input type="text"  id="value" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><textarea name="" id="description" cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
                    '<td><button type="button" id="'+ i +'" class="btn btn-block btn-default btn-xs active remove_row" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                    '</tr>'
                );
                //auto row index number param section
                $('.param .row_param').each(function(j){
                    $(this).children("td:eq(0)").html(++j + ".");
                });
            });
            $(document).on('click','.remove_row',function (){
                var row_id=$(this).attr("id");
                $('#row'+row_id+'').remove();
                //eklenen tablo satiri silindikten sonra numralarin siralı halde kalmasi param section
                $('.param .row_param').each(function(j){
                    $(this).children("td:eq(0)").html(++j + ".");
                });
            });
        });
    </script>
    <!--auto number added rows-->
    <script>
        $(document).ready(function(){
            $("#add-row-field").click(function(){
                $("#field").modal('show');
                $("#modaltwo").hide();
            });
            $("#next").click(function (){
                $("#field").modal('show');
                $("#modalone").hide();
                $("#modaltwo").show();
                $('#modaltwo').val('null');//tur seciminde option null degerinin sabit kalmasını sağlar
            });
        });
    </script>
    <!-- Modal Select Box-->
    <script>
        $(document).ready(function () {
            $("#modaltwo").change(function () {
                var name = $(this).val();
                if (name == "oneinput") {
                    $(".contents").html("<br>" +
                        "<label for='default' style='margin-right:15px;' >Default</label>"+
                        "<input type='text' name='default'  style='width: 351px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>" +
                        "<label for='placeholder' style='margin-right:15px;' >Placeholder</label>"+
                        "<input type='text' name='placeholder'  style='width: 319px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>");
                }
                else if(name=="null"){
                $(".contents").html("");
                }
                else if(name=="twotextarea"){
                    $(".contents").html("<br>" +
                        "<textarea  name='description' cols='46' rows='2' style='border: 1px solid #ced4da; border-radius: 5px;'></textarea>" +
                        "<label for='default' style='float:left; margin-right:15px;' >Default</label>"+
                        "<label for='placeholder' style='margin-right:15px;' >Placeholder</label>"+
                         "<input type='text' name='placeholder'  style='width: 319px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>");
                }
                else if(name=="threeselect"){
                    $(".contents").html("<div class='card-body' style='padding:0px;'>" +
                        " <table class='table table-bordered modalselect'>" +
                        " <thead> <button type='button' id='add-row-select' class='btn btn-block btn-default btn-xs' style='width: 25px; margin: 6px; float:right;  margin-right:24px;'><i class='fa fa-plus' aria-hidden='true'></i></button>" +
                        " <tr><th style='width:5px;'>#</th>" +
                        " <th style='width:10px;'>Key</th>" +
                        " <th style='width:20px;'>Value</th>" +
                        "<th style='width:4px;'></th></tr>" +
                        " </thead> " +
                        "<tbody><tr>" +
                        "<td style='width:5px;'>0.</td>" +
                        "<td><input type='text' id='key' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> " +
                        "<td><input type='text' id='value' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> "+
                        "<td><button type='button' class='btn btn-block btn-default btn-xs active remove_row' style='width: 25px; margin: 5px; margin-left:15px;'><i class='fa fa-times' aria-hidden='true'></i></button></td></tr> </tbody> </table> </div> </div><br>" +
                        "<label for='default' style='margin-right:15px;'>Default</label>"+
                        "<input type='number' min='0' max='100' style='width: 375px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'>");
                }
                else if(name=="fourcheckbox"){
                    $(".contents").html("<br> " +
                        "<label for='default' style='float:left; margin-right:35px;'>Default</label>"+
                        "<div class='form-check'>" +
                        "<input class='form-check-input' type='checkbox' value='default' id='flexCheckChecked' checked><label class='form-check-label' for='flexCheckChecked'><input type='text' placeholder='Onayla'  style='width: 330px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'> </label> </div><br>"+
                        "<div class='form-check' style='margin-left:66px;'>" +
                        "<input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'> <label class='form-check-label' for='flexCheckDefault'><input type='text' placeholder='Onaylama'  style='width: 330px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></label></div>");
                }
                else{
                    $(".contents").html("<div class='card-body' style='padding:0px;'>" +
                        " <table class='table table-bordered modalradio'>" +
                        " <thead> <button type='button' id='add-row-radio' class='btn btn-block btn-default btn-xs' style='width: 25px; margin: 6px; float:right;  margin-right:24px;'><i class='fa fa-plus' aria-hidden='true'></i></button>" +
                        " <tr><th style='width:5px;'>#</th>" +
                        " <th style='width:10px;'>Key</th>" +
                        " <th style='width:20px;'>Value</th>" +
                        "<th style='width:4px;'></th></tr>" +
                        " </thead> " +
                        "<tbody><tr>" +
                        "<td style='width:5px;'>0.</td>" +
                        "<td><input type='text' id='key' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> " +
                        "<td><input type='text' id='value' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> "+
                        "<td><button type='button' class='btn btn-block btn-default btn-xs active remove_row' style='width: 25px; margin: 5px; margin-left:15px;'><i class='fa fa-times' aria-hidden='true'></i></button></td></tr> </tbody> </table> </div> </div><br>" +
                        "<label for='default' style='margin-right:15px;'>Default</label>"+
                        "<input type='number' min='0' max='100' style='width: 375px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'>");
                }
                //modal selectbox select option
                var i=1;
                $("#add-row-select").click(function (){
                    i++;
                    var k=0;
                    $(".modalselect").append(
                        '<tr id="row'+ i +'" class="row_select_modal">'+
                        '<td style="width:5px;"></td>'+
                        '<td><input type="text" id="key" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><input type="text"  id="value" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><button type="button" id="'+ i +'" class="btn btn-block btn-default btn-xs active remove_row_select" style="width: 25px; margin: 5px; margin-left:15px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                        '</tr>'
                    );
                    //auto row index number param section
                    $('.modalselect .row_select_modal').each(function(k){
                        $(this).children("td:eq(0)").html(++k + ".");
                    });
                });
                $(document).on('click','.remove_row_select',function (){
                    var row_id=$(this).attr("id");
                    $('#row'+row_id+'').remove();
                    //eklenen tablo satiri silindikten sonra numralarin siralı halde kalmasi param section
                    $('.modalselect .row_select_modal').each(function(k){
                        $(this).children("td:eq(0)").html(++k + ".");
                    });
                });
                //modal selectbox radio option
                var i=1;
                $("#add-row-radio").click(function (){
                    i++;
                    var c=0;
                    $(".modalradio").append(
                        '<tr id="row'+ i +'" class="row_radio_modal">'+
                        '<td style="width:5px;"></td>'+
                        '<td><input type="text" id="key" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><input type="text"  id="value" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><button type="button" id="'+ i +'" class="btn btn-block btn-default btn-xs active remove_row_radio" style="width: 25px; margin: 5px; margin-left:15px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                        '</tr>'
                    );
                    //auto row index number radio section
                    $('.modalradio .row_radio_modal').each(function(c){
                        $(this).children("td:eq(0)").html(++c + ".");
                    });
                });
                $(document).on('click','.remove_row_radio',function (){
                    var row_id=$(this).attr("id");
                    $('#row'+row_id+'').remove();
                    //eklenen tablo satiri silindikten sonra numralarin siralı halde kalmasi radio section
                    $('.modalradio .row_radio_modal').each(function(c){
                        $(this).children("td:eq(0)").html(++c + ".");
                    });
                });
            });

        });
    </script>
    <script>//modalın sayfa yenilenmeden ilk halini aciyor
        $("#field").on("hidden.bs.modal", function(){
            $('.modal-body #modalone').show();
            $('#modaltwo').hide();
            $('.contents').hide();
        });
       $("#field").change(function (){
            $('.contents').show();
       });
    </script>


@endsection
    <!-- /.content -->
@endsection
