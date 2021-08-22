<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  
    </head>
    <body>
        @include('layouts.user_header')
        <!-- Main Content-->
  <form action="{{route('blog_edit_submit',$blog->bango)}}" method="post" enctype="multipart/form-data">
    @csrf
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
     
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
  <div class="form-group">
    <label for="exampleFormControlInput1">Blog title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name" value="{{$blog->kokyakuorderbango}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Tag words</label>
    <input type="text" class="form-control" name="tag" value="{{$blog->datachar04}}" id="exampleFormControlInput2" placeholder="tags">
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category" id="category">
        @foreach($categories as $category)
        <option value="{{$category->bango}}" @if($blog->intorder01 == $category->bango) selected="selected" @endif>{{$category->category1}}</option>
        @endforeach
    </select>
  </div>
  <input id="upload" type="file" name="photo" onchange="readURL(this);" class="form-control border-0" value="{{asset('storage/app/images/'.$blog->datachar06)}}">
  <div class="form-group">
    <label for="editor1">Lower text</label>
    <textarea class="form-control" name="editor1" id="editor1" rows="3">{!!$blog->datachar05!!}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>
</section>
        @include('layouts.user_footer')
    </body>
</html>
<script type="text/javascript">
  
/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

 CKEDITOR.replace( 'editor1' );
</script>