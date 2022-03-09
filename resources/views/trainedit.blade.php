<html>
<head>
    <meta charset="utf-8">
    <title>Laravel MongoDB CRUD İşlemleri</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="container">
    <form method="post" action="{{ route('update', $id)}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Color">İsim:</label>
                <input type="text" class="form-control" name="isim" value="{{$person->isim}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Leg">Soyisim:</label>
                <input type="text" class="form-control" name="soyad" value="{{$person->soyad}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
