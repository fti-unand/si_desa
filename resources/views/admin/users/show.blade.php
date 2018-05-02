@extends('blank')

@section('content')

<!--/.col-->
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informasi User
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <p class="col-form-label">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Passowrd</label>
                        <div class="col-md-9">
                            <p class="col-form-label">*******</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Role</label>
                        <div class="col-md-9">
                            @foreach($roles as $role)
                                <span class="badge badge-pills badge-primary">{{ $role }} </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Profile Picture</label>
                        <div class="col-md-9 text-center">
                            <img src="public/img/avatar/{{ $user->avatar }}" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection