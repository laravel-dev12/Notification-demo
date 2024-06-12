@extends('layouts.master')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/css/bootstrap-datetimepicker.min.css')}}">
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route("notifications.index")}}">Notifications </a></li>
<li class="breadcrumb-item active">Send Notification</li>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Send Notification</h3>
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

        {!! Form::open(['route' => 'notifications.store','files'=>true,'method'=>'post']) !!}
        <div class="row"> 
            <div class="form-group col-md-6">
                {!! Form::label('user_id','Select Users', ['class' => 'form-label']) !!}

                <select id="user_id" name="user_id[]" class="form-control" required multiple>
                  <option value="0">All</option>
                  @foreach($users as $user)
                  <option value="{{$user->id}}" >{{$user->name}} </option>
                  @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('type','Select Type', ['class' => 'form-label']) !!}
                <select id="type" name="type" class="form-control" required>
                  <option value="">Select Type</option>                  
                  <option value="Marketing">Marketing </option>                  
                  <option value="Invoices">Invoices </option>                  
                  <option value="System">System </option>                  
                </select>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('message', "Message", ['class' => 'form-label']) !!}
                {!! Form::textarea('message', null,['class' => 'form-control','required','size'=>'3x2']) !!}
            </div>
  
            <div class="form-group col-md-6">
                {!! Form::label('expiry_date','Expiry Date', ['class' => 'form-label']) !!}                  
                {!! Form::text('expiry_date',date("Y-m-d H:i",strtotime('+7 days')),['class'=>'form-control','required']) !!}                  
            </div>
        </div>

        <div class="col-md-12">
          {!! Form::submit("Send", ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section("script")
<script src="{{ asset('assets/plugins/js/moment.js') }}"></script>
<script src="{{ asset('assets/plugins/js/datetimepicker.js') }}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $('#user_id').select2({placeholder: "Select Users"});
    $('#expiry_date').datetimepicker({format: 'YYYY-MM-DD HH:mm',sideBySide: true,icons: {
              previous: 'fa fa-arrow-left',
              next: 'fa fa-arrow-right',
              up: "fa fa-arrow-up",
              down: "fa fa-arrow-down"
  }});
</script>
@endsection
