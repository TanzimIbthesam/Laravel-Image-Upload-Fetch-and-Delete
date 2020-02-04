
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="container">
        <div class="row">
         <div class="card">
             <div class="card-header">
                 File Upload
             </div>
             <div class="card-body">

             <form action="{{'imageupload/upload'}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="name" name="name" class="form-control" id="">
                </div>
                        <div class="form-group">

                  <input type="file" name="upload_image" id="" class="form-control" placeholder="Upload your image" aria-describedby="helpId">
                        </div>
                        .<div class="form-group">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



             </div>
         </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-md-8">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Sl no</th>
                         <th>Name</th>
                         <th>Photo</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         @foreach($imageuploads as $imageupload)
                     {{-- <td scope="row">{{$imageupload->id}}</td> --}}
                     {{-- <td>{{$loop index+1}}</td> --}}
                         <td>{{$imageupload->name}}</td>
                     <td><img src="{{asset('public2/'. $imageupload->upload_image)}}" width="50px"height="50px" alt=""></td>
                     <td><a href="editimage/{{$imageupload->id}}">Edit</a></td>
                     </tr>
                        @endforeach
                 </tbody>
             </table>
           </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

