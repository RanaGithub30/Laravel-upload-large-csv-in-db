<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
          #msg{
            height: 65px; 
            width: 60%; 
            margin-left: 20%; 
            margin-bottom: 1%;
          }
    </style>
</head>
<body class="bg-secondary p-3">

    <center> <h2 style="margin-bottom: 20px;" class="p-5"><u>Upload Millions of Records with Progress Bar</u></h2> </center>

    @if (Session::has('success'))
    <div id="msg" class="bg-light p-3 rounded">
            <p class="text-primary text-center"><b>{{ Session::get('success') }}</b></p>
    </div>
    @endif

    <div id="file_upload" class="container border border-dark border-3 p-5 rounded">
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="file" class="form-control m-2 border border-dark border-2" name="file" id="file" required>
        <input type="submit" class="form-control m-2 btn btn-primary " value="Submit">
    </form>
    </div>

</body>
</html>