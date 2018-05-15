@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('penduduk.index') }}"><i class="icon-list"></i> List</a>
@endsection

{{-- Content Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12"> 
        <div class="card">

            {!! Form::model($penduduk, ['route' => ['penduduk.update', $penduduk->id], 'files' => true, 'method' => 'put'] ) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Update penduduk
            </div>

            <div class="card-body">    

                    @include('penduduk._form')

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