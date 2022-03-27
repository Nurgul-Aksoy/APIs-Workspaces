@extends('master.admin')
@section('content')

 <h4><i class="fa fa-solid fa-list-ul nav-icon"> Kategori Ekle</i></h4><br>



 <!-- Main content -->
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <!-- left column -->
             <div class="col-md-6">
                 <!-- general form elements -->
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Kategori Ekle</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form action="{{ route('store') }}" method="post">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Kategori Adı</label>
                                 <input type="text" class="form-control" name="name">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Kategori Sırası</label>
                                 <input type="number" class="form-control" name="order" min="0" max="100">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputFile">Açıklama</label>
                                 <div class="input-group">
                                     <textarea  name="description" cols="64" rows="2" style="border: 1px solid #ced4da; border-radius: 5px; "></textarea>
                                 </div>
                             </div>

                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Ekle</button>
                         </div>
                     </form>
                 </div>
                 <!-- /.card -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
@endsection

