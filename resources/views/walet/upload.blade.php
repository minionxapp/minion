<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upload File Store Laravel | Kodingin</title>
  </head>
  <body class="container p-5">
    <h1>Select Image</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="featured_image" id="" class="form-control"><br>
        <button type="submit" class="btn btn-dark form-control">Upload Now</button>
    </form>
  </body>
</html>