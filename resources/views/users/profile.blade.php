@extends('layouts.master')
@section('extra_css')
  <style type="text/css">

    /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

  </style>
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("users.index")}}">Users </a></li>
<li class="breadcrumb-item active">User Settings</li>
@endsection
@section('right_navbar')
<ul class="navbar-nav ml-auto">
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      @if($unreadNotifications>0)
      <span class="badge badge-warning navbar-badge count">{{$unreadNotifications}}</span>
      @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header"><span class="count">{{$unreadNotifications}}</span> Notifications</span>
      <div class="dropdown-divider"></div>
      @foreach ($notifications as $notification)
        <a href="#" class="dropdown-item read" title="{{$notification->data['message']}}" data-id="{{$notification->id}}" data-count="{{$unreadNotifications}}">
          <i class="fas fa-envelope mr-2"></i> {{$notification->data['message']}}          
        </a>
        <div class="dropdown-divider"></div>          
      @endforeach      
    </div>
  </li>
</ul> 
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">User Notification Settings</h3>
      </div>

      <div class="card-body">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif

        {!! Form::open(['route' => 'profile.update','files'=>true,'method'=>'post']) !!}
        {!! Form::hidden('user_id',$user->id) !!}
        <div class="row"> 
          <div class="form-group col-md-6">
            {!! Form::label('email', "Email", ['class' => 'form-label']) !!}
            {!! Form::text('email', $user->email,['class' => 'form-control','required']) !!}
          </div>

          <div class="form-group col-md-6">
            {!! Form::label('phone','Phone', ['class' => 'form-label']) !!}                  
            {!! Form::text('phone',$user->phone,['class'=>'form-control','required']) !!}                  
          </div>

          <div class="form-group col-md-6">
            <div class="row">
                <div class="col-md-3">
                  <label class="switch">
                  <input type="checkbox" name="notification_switch" value="1"{{($user->notification_switch)?'checked':''}}>
                  <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-md-3" style="margin-top: 5px">
                  <h4>Notify?</h4>
                </div>
              </div>
          </div>
        </div>

        <div class="col-md-12">
          {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section("script")
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
@endsection
