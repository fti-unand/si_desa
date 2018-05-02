@extends('blank')

@section('content')

<!--/.col-->
<div class="row">
    <div class="col-md-12"> 
        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update User
            </div>

            <div class="card-body">
                {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put'] ) !!}

                {{ Form::close() }}
            </div>

        </div>
    </div>
</div>
@endsection