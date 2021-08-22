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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
        <style type="text/css">
            body{
    margin-top:20px;
    background:#ebeef0;
}

.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}
        </style>
    </head>
    <body>
        <!-- Navigation--> 
        @include('layouts.user_header')
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        
                        <h2 class="section-heading">The Final Frontier</h2>
                        @if(\Session::get('user') && $blog->kokyakubango==\Session::get('user')->bango)
                        <a type="button" href="{{route('blog_delete',[$blog->bango])}}" class="btn btn-danger">Delete</a>
                        <a type="button" href="{{route('blog_edit',[$blog->bango])}}" class="btn btn-info">Edit</a>
                        @endif
                        <a href="#!"><img class="img-fluid" src="{{asset('storage/app/images/'.$blog->datachar06)}}" alt="..." /></a>
                        {!!$blog->datachar05!!}
                    </div>
                    <div class="col-md-10 col-lg-8 col-xl-7">
                     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="container bootdey">
            <div class="col-md-12 bootstrap snippets">
            <div class="panel">
              <div class="panel-body">
                <form action="{{route('post_comment')}}" method="post">
                    @csrf
                <textarea class="form-control" name="comment" rows="2" placeholder="What are you thinking?"></textarea>
                <input type="hidden" name="post_id" value="{{$blog->bango}}">
                <div class="mar-top clearfix">
                  <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
      
                </div>
                </form>
              </div>
            </div>
    <div class="panel">
       <div class="panel-body">
    
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block pad-all">
      <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
      <div class="media-body">
        @foreach($blog->comments as $comment)
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline">{{\App\Models\User::find($comment->yoteisu)->name}}</a>
          <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>at {{$comment->kanryoubi}}</p>
        </div>
        <p>{{$comment->datachar01}}</p>
        @if((\Session::get('user')) && \Session::get('user')->bango == $comment->yoteisu)
        <a type="button" href="{{route('comment_delete',[$comment->orderbango,$comment->kanryoubi])}}" class="btn btn-danger">Delete</a>
        <button type="button" onclick="open_modal('{{$comment->orderbango}}','{{$comment->kanryoubi}}','{{$comment->datachar01}}')" class="btn btn-info">Edit</button>
        @endif
        @endforeach
         </div>
        </div>
        <!--===================================================-->
        <!-- End Newsfeed Content -->
      </div>
    </div>
    </div>
    </div>
                    
                    </div>
                </div>
                
            </div>
        </article>
        <!-- Footer-->
        @include('layouts.user_footer')

        <!-- modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="comment_edit">
            @csrf
        <input type="hidden" name="id" id="post_id_edit">
        <input type="hidden" name="time" id="comment_time_edit">
        <textarea name="edited_comment" id="edited_comment"></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="submit_form()" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <script type="text/javascript">
            function open_modal(id,time,comment) {
                $("#edited_comment").text(comment)
                $("#comment_time_edit").val(time)
                $("#post_id_edit").val(id)

                $('#editModal').modal('show');
                
            }

            function submit_form(){
                var time=$("#comment_time_edit").val()
                var id=$("#post_id_edit").val()
                $('#comment_edit').attr("action","/comment_edit/"+id+"/"+time)
                $('#comment_edit').submit()
            }
        </script>
    </body>
</html>
