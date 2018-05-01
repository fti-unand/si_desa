@extends('blank')

@section('content')

<!--/.col-->
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar User
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center"th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>

                            <td class="text-center">
                                @if($user->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Non Aktif</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <button onclick="event.preventDefault();deleteUser({{$user->id}});" class="btn btn-sm btn-outline-danger">Hapus</button>
                                @if($user->status == 1)
                                    <a href="{{ route('users.deactivate', [$user->id]) }}" class="btn btn-sm btn-outline-primary">NonAktifkan</a>
                                @else
                                    <a href="{{ route('users.activate', [$user->id]) }}" class="btn btn-sm btn-outline-primary">NonAktifkan</a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<form 
@endsection