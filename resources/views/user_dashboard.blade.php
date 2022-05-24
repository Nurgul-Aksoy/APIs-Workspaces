@extends('user.user_admin')
@section('user_contents')
    @if(isset($data_model))

    <!--Header-Param-Endpoint-->
    <button type="button" class="btn btn-primary btn-sm" style="position:absolute; top:0px; right:0px;" onclick = "sendRequest()">Send</button>
    <hr style=" border:none;border-left: 1px solid black;height: 150vh;width: 1px; margin-top:-15px;">

    <div class="col-12 col-sm-6" style=" position:absolute; top:0px; left:0px;">


        <!--Category ismi alindi-->
        @foreach($categorylist as $ct)
            @if($ct['id']==$data_model['category'])
                <p style=" font-weight: bold; font-size: 20px;">{{$ct['name']}}</p>
            @endif
        @endforeach
        <!--Endpoint ismi alindi-->
        <p style=" font-weight: bold;">{{$data_model['name']}}</p>

                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-append">
                                @switch($data_model['type'])

                                    @case("Get")
                                    <button class="btn btn-primary" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px; font-family:  Georgia;">{{$data_model['type']}}</button>
                                    @break

                                    @case("Post")
                                    <button class="btn btn-success" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px; font-family:  Georgia;">{{$data_model['type']}}</button>
                                    @break

                                    @case("Put")
                                    <button class="btn btn-info" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px; font-family:  Georgia;">{{$data_model['type']}}</button>.
                                    @break

                                    @case("Patch")
                                    <button class="btn btn-danger" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px; font-family:  Georgia;">{{$data_model['type']}}</button>
                                    @break

                                    @default <!--Delete-->
                                    <button class="btn btn-warning" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px; font-family:  Georgia;">{{$data_model['type']}}</button>
                                @endswitch
                              <!--  <button class="btn btn-danger" id="request_type" value="{{$data_model['type']}}" style="font-size: 12px;">{{$data_model['type']}}</button>-->
                            </div>
                            <input class="form-control form-control-lg" id="request_url" disabled value="{{$data_model['url']}}">

                        </div>
                        <p style="font-size:15px;">* {{$data_model['description']}}</p>


            <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-messages-tab" data-toggle="tab" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="true">Areas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="custom-tabs-four-home-tab" data-toggle="tab" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Header</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="tab" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Param</a>
                    </li>

                </ul>
            </div>
            <div class="card-body" style="padding:0px;">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab"> <!--Haeder table -->

                            @foreach($data_model['areas'] as $key=>$value)

                        <div class="card-body">
                            <div class="form-group request-body">
                                <label for="exampleInputEmail1" id="areas_name" style="width: 100%;">{{$value['name']}}</label><br>
                                @switch($data_model['areas'][0]['component']['type'])
                                    @case("input")
                                    <div class="form-group">
                                            @if($data_model['areas'][0]['component']['default'])
                                                <input type="text"   style="width: 100%; font-size:12px;" data-type="input" class="form-control bodyinput component" data-id="{{$data_model['areas'][0]['key']}}" placeholder="{{$data_model['areas'][0]['component']['placeholder']}}" value="{{$data_model['areas'][0]['component']['default']}}">
                                            @endif
                                        </div>
                                    @break
                                    @case("textarea")
                                    <div class="form-group">
                                            @if($data_model['areas'][0]['component']['default'])
                                                <textarea data-id="{{$data_model['areas'][0]['key']}}"  class="component" data-type="textarea" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; " placeholder="{{$data_model['areas'][0]['component']['placeholder']}}">{{$data_model['areas'][0]['component']['default']}}</textarea>
                                            @endif
                                        </div>
                                    @break
                                    @case("select")
                                    <div class="form-group">
                                    <select name="select_area" class="component" style="width: 490px; border-radius: 0.25rem; border: 1px solid rgba(0, 0, 0, 0.125); padding: 1px 2px;" data-id="{{$data_model['areas'][0]['key']}}" data-type="select">
                                        @foreach($data_model['areas'][0]['component']['options'] as $data)
                                            @foreach($data as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                        </div>
                                    @break
                                    @case("checkbox")
                                    <div class="form-group ">
                                    <div class="contents" style="margin-left: 20px;">
                                        <div class="form-check"><input class="component" type="checkbox" data-type="checkbox" data-id="{{$data_model['areas'][0]['key']}}" value="{{$data_model['areas'][0]['component']['default']}}" checked="">
                                            <label class="form-check-label" for="flexCheckChecked" id="check">
                                                {{$data_model['areas'][0]['component']['default']}}</label>
                                        </div>
                                    </div>
                                        </div>
                                    @break
                                    @default
                                    <div class="form-group">
                                        @foreach($data_model['areas'][0]['component']['options_radio'] as $data)
                                            @foreach($data as $key=>$value)
                                                <input type="radio" data-type="radio" class="component" data-id="{{$key}}" style="width:10px;" name="{{$data_model['areas'][0]['key']}}" value="{{$value}}">
                                                <label for="html">{{$value}}</label><br>
                                            @endforeach
                                        @endforeach
                                        </div>
                                @endswitch
                                <div class="form-group">
                                     <p id="areas_desc">{{$data_model['areas'][0]['description']}}</p>
                                    </div>
                                </div>
                        </div>

                        @endforeach
                        <!-- /.card-body -->
                        <!--Haeder table -->
                  </div>
                    <div class="tab-pane fade " id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <!--Haeder table -->
                        <div class="card-body" style="padding:0px;">
                            <table class="table table-bordered header_user">
                                <thead>
                               <tr>
                                    <th style="width:20px;">Key</th>
                                    <th style="width:20px;">Value</th>
                                    <th style="width:50px;">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data_model['header_endpoint'] as $header)
                                <tr>
                                    <td><p class="headerKey" style="width:100%;">{{$header['key']}}</p></td>
                                    <td><input type="text"  name="headerValue"  style="width: 100%; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$header['value']}}"></td>
                                    <td><p style="width:100%;">{{$header['description']}}</p></td>
                                  </tr>
                                </tbody>
                                @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!--Param table -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <!--Param table -->
                        <div class="card-body" style="padding:0px;">
                            <table class="table table-bordered param_user">
                                <thead>
                               <tr>
                                    <th style="width:10px;">Key</th>
                                    <th style="width:20px;">Value</th>
                                    <th style="width:50px;">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data_model['parameters'] as $param)
                                <tr>
                                    <td><p style="width:100%;" class="requestKey">{{$param['key']}}</p></td>
                                    <td><input type="text" name="requestValue"  style="width: 100%; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$param['value']}}"></td>
                                    <td><p style="width:100%;">{{$param['description']}}</p></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    </div>
                @else
                @endif
            </div>
            <!-- /.card -->
    </div>
    @section('scripts')
        <script type="text/javascript">

            //var paramAppend = document.getElementById('request_url'); //url adresine aparametre eklendi
            let requestUrl= $("#request_url").val();
            let requestType= $("#request_type").val();
            let url=new URL(requestUrl);

            function sendRequest() {
                url = new URL(requestUrl);
                let areaOfBody = {};
                $('.request-body .component').each(function (k, v) {
                    switch ($(v).data('type')) {
                        case "input":
                            areaOfBody[$(v).data('id')] = $(v).val();
                            break;
                        case "textarea":
                            areaOfBody[$(v).data('id')] = $(v).val();
                            break;
                        case "select":
                          // console.log( $('.request-body .component option:checked').text());
                            areaOfBody[$(v).data('id')] = $('.request-body .component option:checked').text();
                            break;
                        case "checkbox":
                            if($(this).is(":checked")) {
                                areaOfBody[$(v).data('id')] = $(v).val();
                            }
                            break;
                        default:/*
                            if(($(v).data('name')).is(":checked")) {
                                 nurgul[$(v).data('id')] = $(v).val();}*/
                            if(($(v).is(":checked"))) {
                                areaOfBody[$(v).data('id')] = $(v).val();}
                            break;


                    }});
               /* $('.request-body .component_second ').each(function (k, v) {
                    switch ($(v).data('type')) {
                        case "radio":
                            if(($(v).is(":checked"))) {
                            nurgul[$(v).data('id')] = $(v).val();}
                            break;}
                });*/
              /*  $('.request-body input[type="checkbox"]:checked').each(function (k,v){
                    console.log($(v).val());

                });*/
                console.log(areaOfBody);
                var body_input= $(".bodyinput").val(); //input value
                var body_in=$(".bodyinput").attr('id'); // input id
                var body_textarea= $("#textarea_areas").val();
              //  var body_select = document.getElementById("select_areas").value; //selectte secilen value degerini alıyor
                var body_select= $("#select_areas option:selected").text();//sselectte secilen text degerini alıyor
                var body_check= $('input:checkbox.form-check-input').filter(':checked').map(function () { //checkbox id degeri alma
                    return this.id;
                }).get();
                var body_radio=$("input[type='radio'][name='userRadio']:checked").attr('id'); //secilen dgerin id'sini geliyor
                var body_radio=$("input[type='radio'][name='userRadio']:checked").val(); //secilend degerin value'sunu alma

                //Param key value değerlerininin alınması
                var key_request = [];
                var value_request = [];
                var key_value = [];
                $('.param_user tbody input').each(function (k, v) {//param value değerlerinin alınması
                    value_request.push($(v).val());
                });

                $('.param_user tbody .requestKey').each(function (k, v) { //param key değerlerinin alınması
                    key_request.push($(v).html());
                });
                //key ve param degerlerinin birlestirilmesi
                Object.assign.apply({}, key_request.map((v, i) => key_value.push({[v]: value_request[i]})));

                //URL ALANINA TUM PARAMETRELER EKLENDİ
                for (let i in key_value) {
                    for (const [key, value] of Object.entries(key_value[i])) {
                        url.searchParams.append(key,value);
                    }
                }
                //document.getElementById("request_url").value=url.href; //send butonuna tıklandığında ekranda url alanına parametre gonderildi
                //console.log(url.href);
                var ajaxUrl=url.href;

                //header key value alma

                var headerKey = [];
                var headerValue = [];

                $('.header_user tbody .headerKey').each(function (k, v) {//param value değerlerinin alınması
                    headerKey.push($(v).html());
                });
                $('.header_user tbody input').each(function (k, v) { //param key değerlerinin alınması
                    headerValue.push($(v).val());
                });

               //İKİ ARRAYİ TEK OBJE İÇERİSİNDE BİRLESTİRME ve json veri tipine dönüstürme
                const mergeArrToJSON = (headerKey, headerValue) => headerKey
                    .map((item, i) => ({[item]: headerValue[i]}))
                    .reduce((json,val)=>Object.assign({},json,val));
                var headerData= mergeArrToJSON(headerKey, headerValue);
                var headerJson = headerData;
                headerJson['Access-Control-Allow-Origin'] = "*";

                 $.ajax({
                     url:ajaxUrl, //? Bu sekilde yazılı oldugunda parametreler payloadda gozukuyor ve  header verisi yok gozukmuyor
                     type: 'POST',
                     dataType: 'json', //sadece json yazınca hata veriyor
                     crossDomain: true ,
                    // headers: headerJson,
                    data: {
                         //data yapısında verilerin nasıl gönderilemesini istersin?
                        //json çıktısı succes içerisinde nasıl olmasını istersin?
                        body: body_input,
                        headers: headerJson,
                        checkbox: body_check,
                        radio: body_radio

                    },
                    success: function (data) {

                         console.log(data);
                    },
                    error: function (error) {
                        console.log(error);

                    }
                });

                }
        </script>
        <script>
            //active buton

          /*  $(".nav-pills .nav-item").click(function () {
                if{
                $(this).addClass(" menu-is-opening menu-open");
                $(".nav-pills .nav-item").removeClass("menu-is-opening menu-open");
                }
                else {
                    $(this).addClass("menu-open ");
                    $(".nav-pills .nav-item").removeClass("menu-is-opening menu-open   ");

                }
            });*//*
            $(".nav-sidebar").click(function(){
                $(this).addClass("menu-is-opening menu-open");
               //$(".nav-pills .nav-item").removeClass("menu-is-opening menu-open");
            });*/
        </script>
    @endsection
@endsection
