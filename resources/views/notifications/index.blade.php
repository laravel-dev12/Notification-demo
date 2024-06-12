@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item active">Notifications</li>
@endsection

@section('content')
<div class="user">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Notifications  &nbsp;
          <a href="{{ route('notifications.create')}}" class="btn btn-success">Send Notification</a></h3>        
      </div>

      <div class="card-body table-responsive">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>User Name</th>
              <th>Type</th>
              <th>Message</th>
              <th>Expiry Date</th>
              <th>Read At</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              @foreach ($user->notifications as $notification)                
                <tr>                
                  <td>
                    {!! $user->name !!}
                  </td>
                  <td>
                    {{ $notification->data['type'] }}
                  </td>
                  <td>{{ $notification->data['message'] }}</td>
                  <td>
                    {{ $notification->data['expiry_date'] }}
                  </td>
                  <td>
                    {{$notification->read_at ? date('Y-m-d H:i A',strtotime($notification->read_at)):'Unread'}}
                  </td>
                </tr>
              @endforeach
            @endforeach
          </tbody>          
        </table>
      </div>      
    </div>
  </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to delete this record?</p>
      </div>
      <div class="modal-footer">
        <button id="del_btn" class="btn btn-danger" type="button" data-submit="">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@endsection
@section('script')
  <script type="text/javascript">
  $("#del_btn").on("click",function(){
    var id=$(this).data("submit");
    $("#form_"+id).submit();
  });

  $('#myModal').on('show.bs.modal', function(e) {
    var id = e.relatedTarget.dataset.id;
    $("#del_btn").attr("data-submit",id);
  });
  </script>
@endsection
