@extends('user.user_admin')
@section('user_contents')

    <!--Header-Param-Endpoint-->
    <button type="button" class="btn btn-primary btn-sm" style="position:absolute; top:0px; right:0px;" onclick = "sendRequest()">Send</button>
    <hr style=" border:none;border-left: 1px solid black;height: 150vh;width: 1px; margin-top:-15px;">

    <div class="col-12 col-sm-6" style=" position:absolute; top:0px; left:0px;">
    @if(isset($data_model))

        <!--Category ismi alindi-->
        @foreach($categorylist as $ct)
            @if($ct['id']==$data_model['category'])
                <p style=" font-weight: bold; font-size: 20px;">{{$ct['name']}}</p>
            @endif
        @endforeach
        <!--Endpoint ismi alindi-->
        <p style=" font-weight: bold;">{{$data_model['name']}}</p>

                        <div class="input-group input-group-sm mb-2">
                            <input class="form-control form-control-lg" id="request_url" disabled value="{{$data_model['url']}}">
                            <div class="input-group-append">
                                <button class="btn btn-danger" id="request_type" value="{{$data_model['type']}}">{{$data_model['type']}}</button>
                            </div>
                        </div>
                        <p style="font-size:15px;">* {{$data_model['description']}}</p>
                        <br>

                        <!--
                        <a href="" id="request_url" style=" pointer-events: none; padding:3px;  border: 1px solid black;  border-radius:3px;">{{$data_model['url']}}</a>
                        <p style="font-size:15px;">* {{$data_model['description']}}</p>
                        <button class="btn btn-primary btn-sm" id="request_type">{{$data_model['type']}}</button>-->



            <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="custom-tabs-four-messages-tab" data-toggle="tab" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="true">Areas</a>
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
                            <div class="form-group">
                                <label for="exampleInputEmail1" id="areas_name">{{$value['name']}}</label><br>
                                @switch($data_model['areas'][0]['component']['type'])
                                    @case("input")
                                            @if($data_model['areas'][0]['component']['default'])
                                                <input type="text" class="form-control" id="input_areas" placeholder="{{$data_model['areas'][0]['component']['placeholder']}}" value="{{$data_model['areas'][0]['component']['default']}}">
                                            @endif
                                    @break
                                    @case("textarea")
                                            @if($data_model['areas'][0]['component']['default'])
                                                <textarea id="textarea_areas" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; " placeholder="{{$data_model['areas'][0]['component']['placeholder']}}">{{$data_model['areas'][0]['component']['default']}}</textarea>
                                            @endif
                                    @break
                                    @case("select")
                                    <select name="select_areas" style="width: 490px; border-radius: 0.25rem; border: 1px solid rgba(0, 0, 0, 0.125); padding: 1px 2px;" >
                                        @foreach($data_model['areas'][0]['component']['options'] as $data)
                                            @foreach($data as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @break
                                    @case("checkbox")
                                    <div class="contents" style="margin-left: 20px;">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="check_areas" value="default" checked="">
                                            <label class="form-check-label" for="flexCheckChecked" id="check_areas">
                                                {{$data_model['areas'][0]['component']['default']}}</label>
                                        </div>
                                    </div>
                                    @break
                                    @default
                                        @foreach($data_model['areas'][0]['component']['options_radio'] as $data)
                                            @foreach($data as $key=>$value)
                                                <input type="radio" id="{{$key}}" name="{{$value}}" value="{{$value}}">
                                                <label for="html" id="radio_areas">{{$value}}</label><br>
                                            @endforeach
                                        @endforeach
                                @endswitch
                    <p id="areas_desc">{{$data_model['areas'][0]['description']}}</p>
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
                                    <td><p class="headerKey">{{$header['key']}}</p></td>
                                    <td><input type="text"  name="headerValue"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$header['value']}}"></td>
                                    <td><p>{{$header['description']}}</p></td>
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
                                    <td><p class="requestKey">{{$param['key']}}</p></td>
                                    <td><input type="text" name="requestValue"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$param['value']}}"></td>
                                    <td><p>{{$param['description']}}</p></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    </div>
                @else <!--Areas alani bos ise data_model bos ise-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name:</label>
                            <input type="text" class="form-control" id="data_name" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Key:</label>
                            <input type="text" class="form-control" id="data_key" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Description:</label>
                            <div class="input-group">
                                <textarea id="data_desc" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; "></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" >Type:</label>
                        </div>
                        </div>
                </div>
                    <div class="tab-pane fade " id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <!--Haeder table -->
                        <div class="card-body" style="padding:0px;">
                            <table class="table table-bordered header">
                                <thead>
                                <tr>
                                    <th style="width:20px;">Key</th>
                                    <th style="width:20px;">Value</th>
                                    <th style="width:50px;">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="key" disabled  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" ></td>
                                        <td><input type="text" name="value"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" ></td>
                                        <td><textarea  name="description" disabled cols="26" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Param table -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <!--Param table -->
                        <div class="card-body" style="padding:0px;">
                            <table class="table table-bordered param">
                                <thead>
                                <tr>
                                    <th style="width:10px;">Key</th>
                                    <th style="width:20px;">Value</th>
                                    <th style="width:50px;">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="key_param" disabled style="width:100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" ></td>
                                        <td><input type="text" name="value_param"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" ></td>
                                        <td><textarea name="description_param" disabled cols="26" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
            </div>
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
           // let params = new URLSearchParams(url.search);
          // var requestUrlid= $("#request_url");

            function sendRequest() {
                /* url.searchParams.append('nurgul', 'aksoy');
                console.log(url.href);*/
                //Param key value değerlerininin alınması
                var key_request = [];
                var value_request = [];
                var key_value = [];
                $('.param_user tbody input').each(function (k, v) {//param value değerlerinin alınması
                    value_request.push($(v).val());
                });
               // console.log(value_request);

                $('.param_user tbody .requestKey').each(function (k, v) { //param key değerlerinin alınması
                    key_request.push($(v).html());
                });
                //key ve param degerlerinin birlestirilmesi

                Object.assign.apply({}, key_request.map((v, i) => key_value.push({[v]: value_request[i]})));


              /*   Object.entries(key_value).forEach(([key, value]) => { //bu kod url'e obje ekliyor searchparams ile
                    console.log(key , value); // key ,value
                     // url.searchParams.append(key,value);
                      //console.log(url.href);

              });*/

                //URL ALANINA TUM PARAMETRELER EKLENDİ
                for (let i in key_value) {
                    for (const [key, value] of Object.entries(key_value[i])) {
                        url.searchParams.append(key,value);
                    }
                }
                document.getElementById("request_url").value=url.href; //send butonuna tıklandığında ekranda url alanına parametre gonderildi
                console.log(url.href);

                //header key value alma

                var headerKey = [];
                var headerValue = [];
                var headerRequest=[];
                var abc= {};

                $('.header_user tbody .headerKey').each(function (k, v) {//param value değerlerinin alınması
                    headerKey.push($(v).html());
                });
                $('.header_user tbody input').each(function (k, v) { //param key değerlerinin alınması
                    headerValue.push($(v).val());
                });
               // Object.assign.apply({}, headerKey.map((v, i) => headerRequest.push({[v]: headerValue[i]})));
                // var myJsonString = JSON.stringify(headerRequest);//Header requestin json veritpine dönüşmesi
               //  console.log(myJsonString );
               //İKİ ARRAYİ TEK OBJE İÇERİSİNDE BİRLESTİRME ve jsoon veri tipine dönüstürme
                const mergeArrToJSON = (headerKey, headerValue) => headerKey
                    .map((item, i) => ({[item]: headerValue[i]}))
                    .reduce((json,val)=>Object.assign({},json,val));
                var headerData= mergeArrToJSON(headerKey, headerValue);
                var headerJson = JSON.stringify(headerData);
                console.log(headerJson); //Headerdatanın json veritpine dönüşmesi


                    /*for (const [key, value] of Object.entries(headerKey)) {
                    console.log(value);
                    }*/
                /*if (!Object.keys(abc).length) {
                    Object.assign(abc,headerRequest);
                }
                console.log(abc);*/



                //Ajax postu oluşturma
                const headerAjax= {

                };
               // console.log(headerAjax);

                }




        </script>
    @endsection
@endsection
