<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!--Mix edilmiş css dosyası-->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/app.css">
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('master.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include('master.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                       <!--Yield section-->
                        @yield('content')


                    </div><!-- /.col -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            @include('sweetalert::alert')

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="public/build.js"></script>
    <!-- jQuery -->
    <script src="{{ env('APP_URL') }}/js/app.js"></script>
    <script>
        //$.widget.bridge('uibutton', $.ui.button)
        $('#t').DataTable();
    </script>
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
        <!--Dinamik olarak tabloya yeni satır ekleme-->
      <!--  <script>
            $(document).ready(function (){
              $("#add-row").click(function (){
                    $(".table tbody tr").last().after(
                        '<tr>'+
                            '<td><input type="text" id="key" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                            '<td><input type="text"  id="value" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                            '<td><textarea name="" id="description" cols="22" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
                            '<td><button type="button" class="btn btn-block btn-default btn-xs active" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                        '</tr>'
                    );
                })
            })
        </script>-->
        <script type="text/javascript">
            $(document).ready(function (){
                var i=1;
                $("#add-row").click(function (){
                    i++;
                    $(".table tbody").append(
                        '<tr id="row'+ i +'">'+
                        '<td><input type="text" id="key" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><input type="text"  id="value" style="width: 100px; border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></td>'+
                        '<td><textarea name="" id="description" cols="22" rows="1" style="border-radius:0.25rem; border:1px solid rgba(0, 0, 0, 0.125)"></textarea></td>'+
                        '<td><button type="button" id="'+ i +'" class="btn btn-block btn-default btn-xs active remove_row" style="width: 25px; margin: 5px;"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                        '</tr>'
                    );
                });
                $(document).on('click','.remove_row',function (){
                    var row_id=$(this).attr("id");
                    $('#row'+row_id+'').remove();
                });

            });
        </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

</body>
</html>
