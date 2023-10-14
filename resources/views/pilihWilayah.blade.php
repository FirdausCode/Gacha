<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pengundian</title>
</head>
<body>
  <table>
    @foreach ($wilayah as $item)
    <tr><a href="/pilih/hadiah/{{ $item->id }}" class="btn btn-primary" >{{ $item->name }}</a></tr>
    @endforeach
  </table>
</body>
</html>