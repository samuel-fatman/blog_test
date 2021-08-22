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
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style type="text/css">
            body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
        </style>
    </head>
    <body>
        @include('layouts.user_header')
        <!-- Main Content-->

        <div class="container px-4 px-lg-5">
            
            <div class="row">
            <div class="leftcolumn">
              @foreach($blogs as $blog)
              <div class="card">
                <h2><a href="{{route('post_detail',$blog->bango)}}">{{$blog->kokyakuorderbango}}</a></h2>
                <h5>{{$blog->datachar04}},{{$blog->date}}</h5>
                <p>{!! substr($blog->datachar05,0,10) !!}...</p>
              </div>
              @endforeach
            </div>
            <div class="rightcolumn">
              <div class="card">
                <h2>Search</h2>
                <input type="text" name="search" placeholder="type to search" value="">
                <button>search</button>
              </div>
              <div class="card">
                <h3>Popular Post</h3>
                <ul>
                  @foreach($categories as $category)
                    <li><input type="checkbox" name="" value="{{$category->bango}}">&nbsp;<span>{{$category->category1}}</span></li>
                  @endforeach
                </ul>
              </div>
              <div class="card">
                <h3>Follow Me</h3>
                <p>Some text..</p>
              </div>
              </div>
            </div>

        </div>
        @include('layouts.user_footer')
    </body>
</html>
