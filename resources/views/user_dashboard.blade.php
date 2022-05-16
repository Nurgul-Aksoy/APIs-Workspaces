@extends('user.user_admin')
@section('user_contents')

    <!--Header-Param-Endpoint-->

    <div class="col-12 col-sm-6">
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

                        @if(isset($data_model))
                            @foreach($data_model['areas'] as $key=>$value)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name:</label>
                                <input type="text" class="form-control" id="data_name" value="{{$value['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Key:</label>
                                <input type="text" class="form-control" id="data_key" value="{{$value['key']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Description:</label>
                                <div class="input-group">
                                    <textarea id="data_desc" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; ">{{$value['description']}}</textarea>
                                </div>
                            </div>
                            @switch($data_model['areas'][0]['component']['type'])
                                @case("input")
                                <div class="form-group">
                                    <label for="exampleInputFile" >Type:</label>
                                    <div class="input-group">
                                        @if($data_model['areas'][0]['component']['default'])
                                            <input type="text" class="form-control" id="input_default" value="{{$data_model['areas'][0]['component']['default']}}">
                                        @else
                                            <input type="text" class="form-control" id="input_placeholder" value="{{$data_model['areas'][0]['component']['placeholder']}}">

                                        @endif
                                    </div>
                                </div>
                                @break
                                @case("textarea")
                                <div class="form-group">
                                    <label for="exampleInputFile" >Type:</label>
                                    <div class="input-group">
                                        @if($data_model['areas'][0]['component']['default'])
                                            <textarea id="data_desc" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; ">{{$data_model['areas'][0]['component']['default']}}</textarea>
                                        @else
                                            <textarea id="data_desc" cols="65" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; " placeholder="{{$data_model['areas'][0]['component']['placeholder']}}"></textarea>
                                        @endif
                                    </div>
                                </div>
                                @break
                                @case("select")
                                <label for="exampleInputFile" >Type:</label>
                                <select name="type" style="width: 490px; border-radius: 0.25rem; border: 1px solid rgba(0, 0, 0, 0.125); padding: 1px 2px;" >
                                    @foreach($data_model['areas'][0]['component']['options'] as $data)
                                        @foreach($data as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    @endforeach
                                    </select>
                                @break
                                @case("checkbox")
                                <label for="exampleInputFile" >Type:</label>
                                <div class="contents" style="margin-left: 20px;">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="checkdefault" value="default" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            {{$data_model['areas'][0]['component']['default']}}</label>
                                    </div>
                                </div>
                                @break
                                @default
                                        <label for="exampleInputFile" >Type:</label>
                                             <select name="type" style="width: 490px; border-radius: 0.25rem; border: 1px solid rgba(0, 0, 0, 0.125); padding: 1px 2px;">
                                                 @foreach($data_model['areas'][0]['component']['options_radio'] as $data)
                                                     @foreach($data as $key=>$value)
                                                         <option value="{{$key}}">{{$value}}</option>
                                                     @endforeach
                                                 @endforeach
                                                </select>
                            @endswitch
                        </div>
                        @endforeach
                        <!-- /.card-body -->
                        <!--Haeder table --></div>
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
                                @foreach($data_model['header_endpoint'] as $header)
                                <tr>
                                    <td><input type="text" name="key" disabled  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$header['key']}}"></td>
                                    <td><input type="text" name="value"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$header['value']}}"></td>
                                    <td><textarea  name="description" disabled cols="26" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)">{{$header['description']}}</textarea></td>
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
                            <table class="table table-bordered param">
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
                                    <td><input type="text" name="key_param" disabled style="width:100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$param['key']}}"></td>
                                    <td><input type="text" name="value_param"  style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)" value="{{$param['value']}}"></td>
                                    <td><textarea name="description_param" disabled cols="26" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)">{{$param['description']}}</textarea></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    </div>
                @endif
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>
    @section('script')
    @endsection
@endsection
