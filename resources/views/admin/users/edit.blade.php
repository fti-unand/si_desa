@extends('blank')

@section('content')

<!--/.col-->
<div class="row">
    <div class="col-md-12"> 
        <div class="card">

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'files' => true, 'method' => 'put'] ) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update User
            </div>

            <div class="card-body">    

                    @include('admin.users._form')

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Update</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>

            {{ Form::close() }}

        </div>
    </div>
</div>
@endsection