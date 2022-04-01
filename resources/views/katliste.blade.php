@extends('master.admin')
@section('content')
    <h4><i class="fa fa-solid fa-list-ul nav-icon"> Kategori Listesi</i></h4><br>
    <!-- /.row -->

    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategori Listesi</h3>

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
                            <th>Kategori ID</th>
                            <th>Kategori Adı</th>
                            <th>Kategori Sırası</th>
                            <th>Açıklama</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($categories as $cat)
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->order}}</td>
                                <td>{{$cat->description}}</td>
                                <td><a href="{{ route('edit',$cat->id) }}">Düzenle</a> </td>
                                <td><form action="{{route('destroy',$cat->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn  show_confirm" type="submit" >Sil</button>
                                    </form></td>
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
    <script src="{{ env('APP_URL') }}/js/app.js"></script>
    <!--SweetAlert Delete-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            swal({
                title: `Kategoriyi silmek istediğinize emin misiniz?`,
                text: "Eğer kaydı silerseniz, bu işlemi geri alamazsınız.",
                icon: "warning",
                buttons: ["İptal", "Onayla"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
