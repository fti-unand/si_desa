@extends('blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th>KK ID</th>
                    <th>Action</th>
                </tr>
                @foreach($penduduks as $penduduk)
                <tr>
                    <td>{{$penduduk->id}}</td>
                    <td><a class="btn btn-primary" href="{!!url('/print'.$penduduk->id)!!}">cetak KK</a></td>
                </tr>
                @endforeach
            <table>
        </div>
    </div>
</div>
@endsection