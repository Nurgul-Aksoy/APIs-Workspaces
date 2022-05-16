@extends('master.admin')
@section('content')

    <h4><i class="fa fa-solid fa-list-ul nav-icon"> Endpoint Ekle</i></h4><br>
    <div style="float: right; margin-top:-55px; margin-right:13px;">
        <button type="submit" class="btn btn-primary btn-sm" id="save_endpoint">Save</button>
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
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url:</label>
                                    <input type="url" class="form-control" name="url" id="form_url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type:</label>
                                    <!--<input type="number" class="form-control" name="order" min="0" max="100">-->
                                    <select name="endpoint" id="form_type" class="form-control">
                                        <option value=""></option>
                                        <option value="get" id="get_type">GET</option>
                                        <option value="post" id="post_type">POST</option>
                                        <option value="put" id="put_type">PUT</option>
                                        <option value="patch" id="patch_type">PATCH</option>
                                        <option value="delete" id="delete_type">DELETE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category:</label>
                                    <!--<input type="number" class="form-control" name="order" min="0" max="100">-->
                                    <select name="category_endpoint" id="form_category" class="form-control">
                                        @foreach($cat_names as $n)
                                            <option value="{{(string)$n->_id}}">{{$n->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name:</label>
                                    <input type="text" class="form-control" name="name" min="0" max="100" id="form_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Description:</label>
                                    <div class="input-group">
                                        <textarea  name="description" cols="64" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; " id="form_description"> </textarea>
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
                                                <td><input type="text" name="key"  style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><input type="text" name="value"  style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><textarea  name="description" cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
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
                                                <td><input type="text" name="key_param"  style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><input type="text" name="value_param"  style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>
                                                <td><textarea name="description_param" cols="19" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
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
                            <table class="table table-hover text-nowrap table-bordered field" id="areastable">
                                <!--Field table -->
                                        <thead>
                                        <tr><th style="width:10px;">Name</th>
                                            <th style="width:10px;">Key</th>
                                            <th style="width:50px;">Description</th>
                                            <th style="width:20px;">Type Section</th>
                                            <th style="width:4px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
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
                    <form id="modalone">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name:</label>
                                <input type="text" class="form-control" id="modalname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Key:</label>
                                <input type="text" class="form-control" id="modalkey">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Description:</label>
                                <div class="input-group">
                                    <textarea id="modaldesc" cols="64" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; "></textarea>
                                </div>
                            </div>
                            <button type="button" id="next" class="btn btn-primary" style="float:right;">Next</button>
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
                    <button type="button" id="savemodal" class="btn btn-primary" onclick="getValueInput()">Save</button>
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
                    '<td><input type="text" name="key" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><input type="text"  name="value" style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><textarea name="description" cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
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
                    '<td><input type="text" name="key_param" " style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><input type="text"  name="value_param"  style="width: 80px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                    '<td><textarea  name="description_param"  cols="20" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
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
                 $(".modal-footer").hide(); //save id'li buton izlendi

            });
            $("#next").click(function (){
                $("#field").modal('show');
                $("#modalone").hide();
                $("#modaltwo").show();
                $('#modaltwo').val('null');//tur seciminde option null degerinin sabit kalmasını sağlar
                $(".modal-footer").show();

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
                        "<input type='text' name='inputdefault' id='inputdefault' style='width: 351px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>" +
                        "<label for='placeholder' style='margin-right:15px;' >Placeholder</label>"+
                        "<input type='text' name='inputplaceholder' id='inputplace'  style='width: 319px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>");
                }
                else if(name=="null"){
                $(".contents").html("");
                }
                else if(name=="twotextarea"){
                    $(".contents").html("<br>" +
                        "<textarea  name='textdesc' id='textdesc' cols='46' rows='2' style='border: 1px solid #ced4da; border-radius: 5px;'></textarea>" +
                        "<label for='default' style='float:left; margin-right:15px;' >Default</label>"+
                        "<label for='placeholder' style='margin-right:15px;' >Placeholder</label>"+
                         "<input type='text' name='textplaceholder'  id='textplace' style='width: 319px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125); padding:1px 2px;'>");
                }
                else if(name=="threeselect"){
                    $(".contents").html("<div class='card-body' style='padding:0px;'>" +
                        " <table class='table table-bordered modalselect' id='type_select'>" +
                        " <thead> <button type='button' id='add-row-select' class='btn btn-block btn-default btn-xs' style='width: 25px; margin: 6px; float:right;  margin-right:24px;'><i class='fa fa-plus' aria-hidden='true'></i></button>" +
                        " <tr><th style='width:5px;'>#</th>" +
                        " <th style='width:10px;'>Key</th>" +
                        " <th style='width:20px;'>Value</th>" +
                        "<th style='width:4px;'></th></tr>" +
                        " </thead> " +
                        "<tbody><tr>" +
                        "<td style='width:5px;'>0.</td>" +
                        "<td><input type='text' name='selectkey' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> " +
                        "<td><input type='text' name='selectvalue' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> "+
                        "<td><button type='button' class='btn btn-block btn-default btn-xs active remove_row' style='width: 25px; margin: 5px; margin-left:15px;'><i class='fa fa-times' aria-hidden='true'></i></button></td></tr> </tbody> </table> </div> </div><br>" +
                        "<label for='default' style='margin-right:15px;'>Default</label>"+
                        "<input type='number'name=selectdefault id='selectdefault' min='0' max='100' style='width: 375px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'>");
                }
                else if(name=="fourcheckbox"){
                    $(".contents").html("<br> " +
                        "<label for='default' style='float:left; margin-right:35px;'>Default</label>"+
                        "<div class='form-check'>" +
                        "<input class='form-check-input' type='checkbox' name='checkdefault' value='default'  checked><label class='form-check-label' for='flexCheckChecked'><input type='text' placeholder='Onayla' id='flexCheckChecked' style='width: 330px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'> </label> </div><br>"+
                        "<div class='form-check' style='margin-left:66px;'>" +
                        "<input class='form-check-input' type='checkbox'  name='checkreject' value='reject' > <label class='form-check-label' for='flexCheckDefault'><input type='text' placeholder='Onaylama' id='flexCheckDefault' style='width: 330px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></label></div>");
                }
                else{
                    $(".contents").html("<div class='card-body' style='padding:0px;'>" +
                        " <table class='table table-bordered modalradio' id='type_radio'>" +
                        " <thead> <button type='button' id='add-row-radio' class='btn btn-block btn-default btn-xs' style='width: 25px; margin: 6px; float:right;  margin-right:24px;'><i class='fa fa-plus' aria-hidden='true'></i></button>" +
                        " <tr><th style='width:5px;'>#</th>" +
                        " <th style='width:10px;'>Key</th>" +
                        " <th style='width:20px;'>Value</th>" +
                        "<th style='width:4px;'></th></tr>" +
                        " </thead> " +
                        "<tbody><tr>" +
                        "<td style='width:5px;'>0.</td>" +
                        "<td><input type='text' name='radiokey' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> " +
                        "<td><input type='text' name='radiovalue' style='width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'></td> "+
                        "<td><button type='button' class='btn btn-block btn-default btn-xs active remove_row' style='width: 25px; margin: 5px; margin-left:15px;'><i class='fa fa-times' aria-hidden='true'></i></button></td></tr> </tbody> </table> </div> </div><br>" +
                        "<label for='default' style='margin-right:15px;'>Default</label>"+
                        "<input type='number' id='radiodefault' name='radiodefault' min='0' max='100' style='width: 375px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)'>");
                }
                //modal selectbox select option
                var i=1;
                $("#add-row-select").click(function (){
                    i++;
                    var k=0;
                    $(".modalselect").append(
                        '<tr id="row'+ i +'" class="row_select_modal">'+
                        '<td style="width:5px;"></td>'+
                        '<td><input type="text" name="selectkey" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><input type="text" name="selectvalue"  style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
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
                        '<td><input type="text" name="radiokey" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><input type="text"  name="radiovalue" style="width: 120px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
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
            $(".modal-footer").hide();
            $('.contents').hide();
        });
       $("#field").change(function (){//sayfa yenilenmeden turler kisminda icerigin gösterildigi alan
            $('.contents').show();
       });
    </script>
    <script>
      var all_list = [];
    //modaldan gelen degerleri alıp array icerisine ekleme
    function getValueInput() {

        //js obje deneme
        const all = {
            key:document.getElementById("modalkey").value,
            name:document.getElementById("modalname").value,
            description:document.getElementById("modaldesc").value,
            component:{
                type:""
            }
        };
        var types= document.getElementById('modaltwo').value; //bu kısım tür seçiminden gelen değer hangisi ise ona göre yapılacak
        switch(types) {
            case "oneinput":
                all.component.type = 'input';
                all.component.default = document.getElementById("inputdefault").value;
                all.component.placeholder = document.getElementById("inputplace").value;
                break;
            case "twotextarea":
                all.component.type = 'textarea';
                all.component.default = document.getElementById("textdesc").value
                all.component.placeholder = document.getElementById("textplace").value;
                break;
            case "threeselect":
                all.component.type = 'select';
                all.component.options = [];
                var key = [];
                var value = [];
                $('#type_select tbody input[name="selectkey"]').each(function (k, v) {
                    key.push($(v).val());
                });
                $('#type_select tbody input[name="selectvalue"]').each(function (k, v) {
                    value.push($(v).val());
                });
                Object.assign.apply({}, key.map( (v, i) =>all.component.options.push({[v]: value[i]})) );
                all.component.default = document.getElementById("selectdefault").value;
                break;
            case "fourcheckbox":
                all.component.type = 'checkbox';
                all.component.default=document.getElementById("flexCheckChecked").value
                all.component.placeholder=document.getElementById("flexCheckDefault").value;
                break;
            case "fiveradio":
                all.component.type = 'radio';
                all.component.options_radio = [];
                var key_radio = [];
                var value_radio = [];
                $('#type_radio tbody input[name="radiokey"]').each(function (k, v) {
                    key_radio.push($(v).val());
                });
                $('#type_radio tbody input[name="radiovalue"]').each(function (k, v) {
                    value_radio.push($(v).val());
                });
                Object.assign.apply({}, key_radio.map( (v, i) =>all.component.options_radio.push({[v]: value_radio[i]})) );
                all.component.default = document.getElementById("radiodefault").value;
                break;
            default:
            // code block bu kısmı null seçilmiş olarak yapılabilir
        }
        all_list.push(all);
        render();
       // console.log(all.check_data[0].flexCheckChecked);//checkbox içerisindeki 0. indekstteki degeri alır.
    }
    //tablo içerisine modaldan girilen değerin kaydedilmesi
    function render() {
        $.each(all_list, function (key, value) {
            $('#areastable').html("");
            $('#areastable').append('<tr><td style="width:25%">' + value.key + '</td><td style="width:20%">' + value.name + '</td><td style="width:30%">' + value.description + '</td><td style="width:25%">' + value.component.type + '</td><td style="width:15%"><button type="button" id="remove-row-param" class="btn btn-block btn-default btn-xs disabled remove_row_fields" style="width: 25px; margin:5px 5px 5px 20px;"><i class="fa fa-times" aria-hidden="true"></i></button></td></tr>');
        });
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>

            //ajax ile verileri göndermek
            $(document).ready(function () {
                $("#save_endpoint").click(function (e) {
                     Swal.fire( 'Kayıt işlemi gerçekleştirildi!',  'Veriler başarılı şekilde veritabanına kaydedildi.',  'success');
                    //Header ve Param
                    var key_header = [];
                    var value_header = [];
                    var description_header = [];
                    var key_param = [];
                    var value_param = [];
                    var description_param = [];

                        $('.header tbody input[name="key"] ').each(function (k, v) {
                            key_header.push($(v).val());
                        });

                        $('.header tbody input[name="value"]').each(function (k, v) {
                            value_header.push($(v).val());
                        });
                        $('.header tbody textarea').each(function (k, v) {
                            description_header.push($(v).val());
                        });

                        $('.param tbody input[name="key_param"]').each(function (k, v) {
                            key_param.push($(v).val());
                        });

                        $('.param tbody input[name="value_param"]').each(function (k, v) {
                            value_param.push($(v).val());
                        });
                        $('.param tbody textarea[name="description_param"]').each(function (k, v) {
                            description_param.push($(v).val());
                        });

                        var result_header = key_header.map((v, i) => ({
                            key: key_header[i],
                            value: value_header[i],
                            description: description_header[i]
                        }));
                        var result_param = key_param.map((v, i) => ({
                            key: key_param[i],
                            value: value_param[i],
                            description: description_param[i]
                        }));

                        //Endpoint Tüm Veriler
                        const endpoint =
                            {
                                name: $("#form_name").val(),
                                url: $("#form_url").val(),
                                type: $("#form_type").val(),
                                category: $("#form_category").val(),
                                description: $("#form_description").val(),
                                header_endpoint: result_header,
                                parameters: result_param,
                                areas: all_list
                            };
                        $.ajax({
                        url: '{{ route ('get_ajax_save') }}',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            endpoint: endpoint,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            //alert(data.success);
                           //Swal.fire('Kayıt işlemi gerçekleştirildi!',  'Veriler başarılı şekilde veritabanına kaydedildi.',  'success');

                           // console.log(data);
                        },
                        error: function (error) {
                            console.log(error);

                        }
                    });
                });
            });

    </script>

@endsection
    <!-- /.content -->
@endsection
