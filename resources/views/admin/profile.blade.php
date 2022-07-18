@extends('layouts.admin')
@section('content')
<section>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Update Profile</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" method="post" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label required">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{old('name') ?: $user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label required">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{old('email') ?: $user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control {{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" id="new_password" placeholder="New Password" value="{{old('new_password')}}">
                                    @if ($errors->has('new_password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="{{old('confirm_password')}}">
                                    @if ($errors->has('confirm_password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputImage" class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" class="form-control" id="inputImage" accept="image/*" onchange="loadFile(event)">
                                    <img src="{{$user->avatar_path}}" id="output" width="100px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
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
@endsection
@section('script')
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endsection
