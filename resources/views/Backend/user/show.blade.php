@extends('BackEnd.starter')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Records</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">ADD NEW</h5><br>
                        <a href="#" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#exampleModal"> <i class="fa fa-plus"></i>Add user</a><br>
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th>Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $user)
                                <tr>
                                    <td><img src="{{asset($user->image)}}" style="width: 60px; height: 60px;"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->joiningDate}} - {{$user->terminationDate}}</td>
                                   <td>
                                   <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="Users-delete-{{$user->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="Users-delete-{{$user->id}}" action="{{route('deleteUser', $user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                    </td>
                                </tr>  
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW RECORD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('storeUser')}}" method="POST" class="p-2" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="register-email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div><!-- End .form-group -->

          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div><!-- End .form-group -->

          <div class="form-group">
            <label for="joining">Date of Joining</label>
            <input type="date" class="form-control" id="joiningDate" name="joiningDate" required>
          </div><!-- End .form-group -->

          <div class="form">
            <label for="leaving">Date of Leaving</label>
            <input type="date" class="form-control" id="terminationDate" name="terminationDate" required>
            
          </div><!-- End .form-group -->

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
           <label class="form-check-label" for="flexCheckDefault">Still working</label>
            </div>


          <div class="form-group">
            <label for="image">Uplaod image</label>
            <input type="file" class="form-control" id="image" name="image" required>
          </div><!-- End .form-group -->

          <div class="form-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">save</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


@endsection

