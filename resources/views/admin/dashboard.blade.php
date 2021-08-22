<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>dashboard</title>
<style type="text/css">
		.content {
    margin: 0;
    padding: 20px 30px 66px;
    position: relative;
    background: #F1F4F5;
    -webkit-transition: margin, .4s;
    transition: margin, .4s;
}
.email-container, .contacts-search, .projects-search {
    position: relative;
}
.inbox-head, .contacts-search, .projects-search {
    min-height: 80px;
    padding: 20px 0;
}
.email-container .search-input, .contacts-search .search-input, .projects-search .search-input {
    width: -webkit-calc(100% - 60px);
    width: calc(100% - 60px);
}
.inbox-head .search-input, .contacts-search .search-input, .projects-search .search-input {
    border: 1px solid #E7EBEC;
    -webkit-border-radius: 3px 0 0 3px;
    border-radius: 3px 0 0 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #8a8a8a;
    float: left;
    height: 40px;
    padding: 0 10px;
}
.email-container .search-btn, .contacts-search .search-btn, .projects-search .search-btn {
    width: 60px;
}
.inbox-head .search-btn, .contacts-search .search-btn, .projects-search .search-btn {
    background: #63A8EB;
    border: none;
    -webkit-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    color: #fff;
    height: 40px;
    padding: 0 20px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.project-wrapper {
    background: transparent !important;
}
.content-box {
    position: relative;
    background: #fff;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 30px;
    overflow: hidden;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
}
.project-item {
    margin-bottom: 12px;
    display: inline-block;
    width: 100%;
    position: relative;
}
.project-item .status-desktop, .project-item .status-mobile {
    margin-top: 20px;
    font-weight: 400;
    width: 100px;
}
.project-box {
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 10px;
    width: -webkit-calc(100% - 100px);
    width: calc(100% - 100px);
}
.white-bg {
    background: #fff !important;
}
.project-item .status-desktop .active:before, .project-item .status-mobile .active:before {
    background: #42b382;
}
.project-item .status-desktop span:before, .project-item .status-mobile span:before {
    content: "";
    display: inline-block;
    width: 15px;
    height: 15px;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    margin-right: 8px;
    vertical-align: middle;
}
.project-item .status-desktop .unactive:before, .project-item .status-mobile .unactive:before {
    background: #E9585B;
}
.project-item .status-mobile {
    position: absolute;
    top: -5px;
    left: 10px;
    display: none;
    background: #fff;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    color: #76828E;
    padding: 5px;
}
.project-item .status-desktop, .project-item .status-mobile {
    margin-top: 20px;
    font-weight: 400;
    width: 100px;
}
.project-box .mobile-tools {
    display: none;
}
.project-box .project-tools {
    margin-top: 5px;
}
.project-box > div {
    width: 25%;
}
.project-box .project-tools a {
    font-size: 20px;
    margin-right: 12px;
    color: #76828E;
}
.project-box .project-progress {
    margin-top: 4px;
}
.project-box > div {
    width: 25%;
}
.project-box .project-progress .progress {
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin-bottom: 0;
}
.project-box .project-tools {
    margin-top: 5px;
}
.project-box .project-tools a {
    font-size: 20px;
    margin-right: 12px;
    color: #76828E;
}
.resp-avatars img{
width:40px;
height:40px;
}
</style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div id="content" class="content" style="min-height: 682px;">
      @if(isset($user))
      <form class="mx-1 mx-md-4" method="post" action="{{route('form_submit')}}">
      @else
      <form class="mx-1 mx-md-4" method="post" action="{{route('form_submit_edit')}}">
      @endif	
                @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      
                      @if(isset($user))
                      <input type="text" id="form3Example1c" name="name" class="form-control " value="{{ $user->name }}" />
                      @else
                      <input type="text" id="form3Example1c" name="name" class="form-control " value="{{ old('name') }}" />
                      @endif
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      @if(isset($user))
                      <input type="email" id="form3Example3c" name="mail" class="form-control" value="{{ $user->mail_soushin }}"/>
                      @else	
                      <input type="email" id="form3Example3c" name="mail" class="form-control" value="{{ old('mail') }}"/>
                      @endif
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="password" class="form-control" value="{{ old('password') }}"/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  	@if(isset($user))
                  	<button type="submit" class="btn btn-primary btn-lg">Edit</button>
                  	@else
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    @endif
                  </div>

                </form>
      <div class="row">
        <div class="col-lg-12">
          <div class="content-box project-wrapper">
          	@foreach($users as $user)
            <div class="project-item">
              <div class="status-desktop pull-left">
                
              </div>
              <div class="project-box white-bg pull-left">
                <div class="status-mobile pull-left">
                  <span class="active">Active</span>
                </div>
                <div class="project-tools mobile-tools text-right pull-left">
                  <a href="#"><i class="fa fa-eye"></i></a>
                  <a href="#"><i class="fa fa-pencil"></i></a>
                  <a href="#"><i class="fa fa-close"></i></a>
                </div>

                <div class="project-name pull-left">
                  <div class="name">{{$user->name}}</div>
                  
                </div>
                <div class="project-progress pull-left">
                  <span class="task-title">Completion with: <span>{{$user->mail_soushin}}</span></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    </div>
                  </div>
                </div>

                <div class="pull-left text-center">
                  
                </div>
                <div class="project-tools desktop-tools text-right pull-left">
                  <!-- <a href="#"><i class="fa fa-eye"></i></a> -->
                  <a href="{{route('edit_user_by_admin',$user->bango)}}"><i class="fa fa-pencil"></i></a>
                  <a href="{{route('delete_user',$user->bango)}}"><i class="fa fa-close"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>

            </div>
            @endforeach
            

          </div>
        </div>
      </div>


      <!--Footer-->
      <div class="footer">© 2015 Copyright</div>
    </div>
  </div>
</body>
</html>