<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upload File Store Laravel | Kodingin</title>
  </head>
  <body class="container p-5">
    <h1>All Image</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>File</th>
            <th>Donwload</th>
        </tr>
        <tr>
            <?php $path = Storage::url('images/GpFqsahAH9HBEVegVcgRvvKzvI4W6BLnLRQJ48Zc.png'); ?>
            <th><img width="100px" src="{{ url($path) }}" alt="" srcset=""></th>
            <th><a href="{{ url($path) }}">Donwload Now</a></th>
        </tr>
    </table>
  </body>
</html>