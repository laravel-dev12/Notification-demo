@extends('layouts.master')
@section("breadcrumb")
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Users </h3>
        
      </div>

      <div class="card-body table-responsive">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Notifications</th>
            </tr>
          </thead>
          <tbody>
            @if($users->count()>0)
            @foreach($users as $row)
              <tr>                
                <td>
                  <a href="{{route('user.profile',$row->id)}}">
                    {!! $row->name !!}
                  </a>
                </td>
                <td>
                  {{ $row->email }}
                </td>
                <td>{{ $row->phone }}</td>
                <td>
                  <a class="btn btn-app">
                    <span class="badge bg-warning">{{$row->unreadNotifications()->where('data->expiry_date', '>=',date('Y-m-d H:i'))->count()}}</span>
                    <i class="fas fa-bullhorn"></i>
                  </a>
                </td>
              </tr>
            @endforeach
            @else
              <tr>
                <td colspan="7" align="center">No records available!</td>
              </tr>
            @endif
          </tbody>
          
        </table>
        <h5>
        </h5>
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
