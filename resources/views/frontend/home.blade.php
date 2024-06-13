
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/frontend/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/frontend/img/favicon.png')}}">
  <title>
    Home
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/frontend/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/frontend/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/frontend/css/material-kit.css?v=3.0.4')}}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/css/pnotify.custom.min.css')}}" media="all" rel="stylesheet" type="text/css" />
</head>

<body class="blog-author bg-gray-200">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        Demo App
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">         
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="material-icons opacity-6 me-2 text-3x1">notifications</i>
              @if($unreadNotifications>0)
              <span class="badge rounded-pill bg-success count">{{$unreadNotifications}}</span>
              @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
              <div class="d-none d-lg-block">
                @foreach ($notifications as $notification)
                <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                  <a class="dropdown-item py-2 ps-3 border-radius-md read" href="#"  data-id="{{$notification->id}}" data-count="{{$unreadNotifications}}">
                    <div class="w-100 d-flex align-items-center justify-content-between">
                      <div>
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">{{$notification->data['type']}}</h6>
                        <span class="text-sm">{{$notification->data['message']}}</span>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
              </div>
              
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
  <header>
    <div class="page-header min-height-400" style="background-image: {{url('assets/frontend/img/city-profile.jpg')}};" loading="lazy">
      <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
  </header>
  <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{asset('assets/frontend/img/user-noimage.png')}}" alt="bruce" loading="lazy">
            </div>
            <section class="py-lg-5">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="card box-shadow-xl overflow-hidden mb-5">
                        <div class="row">
                          <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: {{url('assets/frontend/img/blog2.jpg')}}" loading="lazy">
                            <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                              <div class="mask bg-gradient-dark opacity-8"></div>
                              <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                                <h3 class="text-white">Contact Information</h3>
                                <p class="text-white opacity-8 mb-4"></p>
                                <div class="d-flex p-2 text-white">
                                  <div>
                                    <i class="fas fa-user text-sm"></i>
                                  </div>
                                  <div class="ps-3">
                                    <span class="text-sm opacity-8">{{$user->name}}</span>
                                  </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                  <div>
                                    <i class="fas fa-phone text-sm"></i>
                                  </div>
                                  <div class="ps-3">
                                    <span class="text-sm opacity-8">{{$user->phone}}</span>
                                  </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                  <div>
                                    <i class="fas fa-envelope text-sm"></i>
                                  </div>
                                  <div class="ps-3">
                                    <span class="text-sm opacity-8">{{$user->email}}</span>
                                  </div>
                                </div>
                                <div class="mt-4">
                                  <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Facebook">
                                    <i class="fab fa-facebook"></i>
                                  </button>
                                  <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Twitter">
                                    <i class="fab fa-twitter"></i>
                                  </button>
                                  <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Dribbble">
                                    <i class="fab fa-dribbble"></i>
                                  </button>
                                  <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Instagram">
                                    <i class="fab fa-instagram"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <form class="p-3" id="contact-form" method="post" action="{{route('profile.update')}}">
                                @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                              <div class="card-header px-4 py-sm-5 py-3">
                                <h2>Update Setttings</h2>
                                <p class="lead"> </p>
                              </div>
                              <div class="card-body pt-1">
                                <div class="row">
                                  <div class="col-md-12 pe-2 mb-3">
                                    <div class="input-group input-group-static mb-4">
                                      <label>Email</label>
                                      <input type="email" class="form-control" placeholder="Email" value="{{old('email',$user->email)}}" name="email">
                                    </div>
                                  </div>
                                  <div class="col-md-12 pe-2 mb-3">
                                    <div class="input-group input-group-static mb-4">
                                      <label>Phone</label>
                                      <input type="text" class="form-control" placeholder="Phone" value="{{old('phone',$user->phone)}}" name="phone">
                                    </div>
                                  </div>
                                  <div class="col-md-12 pe-2 mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check form-switch mb-4 d-flex align-items-center">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{($user->notification_switch)?'checked':''}} value="1" name="notification_switch">
                                          <label class="form-check-label ms-3 mb-0" for="flexSwitchCheckDefault">Notification </label>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 text-end ms-auto">
                                    <button type="submit" class="btn bg-gradient-info mb-0">Update</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          </div>
        </div>
      </div>
    </section>
    <!-- END Testimonials w/ user image & text & info -->
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="">Notifications</h3>
          </div>
        </div>
        <div class="row">
            @foreach ($notifications as $notification)
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-plain">
                        
                        <div class="card-body px-0">
                        <h5>
                            <a href="javascript:;" class="text-dark font-weight-bold">{{$notification->data['type']}}</a>
                        </h5>
                        <p>
                            {{$notification->data['message']}}
                        </p>                
                        </div>
                    </div>
                </div>   
            @endforeach
        </div>
      </div>
    </section>
    <!-- END Blogs w/ 4 cards w/ image & text & link -->
  </div>

  <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
  <footer class="footer py-5">
    <div class="container z-index-1 position-relative">
      <div class="row">
        <div class="col-lg-4 me-auto mb-lg-0 mb-4 text-lg-start text-center">
          <h6 class="text-dark font-weight-bolder text-uppercase mb-lg-4 mb-3">Demo App</h6>
          
          <p class="text-sm text-dark opacity-8 mb-0">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> 
          </p>
        </div>
        <div class="col-lg-6 ms-auto text-lg-end text-center">
          
          <a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
            <span class="fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
            <span class="fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
            <span class="fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-dark opacity-5">
            <span class="fab fa-github"></span>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
  <!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('assets/plugins/js/pnotify.custom.min.js')}}"></script>

    <script>    
        $(".read").on("click",function(){
        
        var notifcation_id=$(this).data("id");
        var count=$(this).data("count");
        $.ajax({
            type: "GET",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "{{ url('read-notification') }}/"+notifcation_id,
            data: "id="+notifcation_id,
            success: function(data){
            if(data.success == 1){
                $('.count').html(count-1);
            new PNotify({
                    title: 'Success!',
                    text: "Notification marked as read!",
                    type: 'success'
                });
            }else{
                new PNotify({
                    title: 'Failed!',
                    text: "Oops! Something went wrong, please try again.",
                    type: 'error'
                });
            }
            },
            dataType: "json"
        });
        });
    </script>
</body>

</html>