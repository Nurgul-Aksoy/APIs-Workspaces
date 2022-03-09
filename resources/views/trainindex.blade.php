<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index sayfası</title>
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('kontrol'))
        <div class="alert alert-success">
            <p>{{ \Session::get('kontrol') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>İsim</th>
            <th>Soyisim</th>
            <th colspan="2">Durum</th>
        </tr>
        </thead>
        <tbody>

        @foreach($trains as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->isim}}</td>
                <td>{{$person->soyad}}</td>
                <td><a href="{{ route('edit',['id'=>$person->id]) }}" class="btn btn-warning">Düzenle</a></td>
                <td>
                    <form action="{{route('destroy',['id'=>$person->id]) }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="sil">
                        <button class="btn btn-danger" type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
