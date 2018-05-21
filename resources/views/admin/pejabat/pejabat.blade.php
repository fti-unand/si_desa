@extends('blank')
@section('breadcrumb')
<a class="btn" href="{{ route('pejabat.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Pejabat
            </div>

            <div class="card-body">

              <table class="table table-responsive-sm table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Nama Nagari</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $datas) {
                      ?>
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datas->nama}}</td>
                        <td>{{$jabatan[$datas->jabatan_id]}}</td>
                        <td>{{$nagari[$datas->nagari_id]}}</td>
                        <td>

                          <a href="{{ route('pejabat.show',[$datas->id]) }}" class="btn btn-sm btn-outline-primary">
                              <i class="fa fa-eye"> </i>
                          </a>

                          <a href="{{ route('pejabat.edit',[$datas->id]) }}" class="btn btn-sm btn-outline-primary">
                              <i class="fa fa-pencil"> </i>
                          </a>
                          <button onclick="event.preventDefault();confirmDeletion('{{ route('pejabat.destroy', [$datas->id]) }}');" class="btn btn-sm btn-outline-danger">
                              <i class="fa fa-trash"> </i>
                          </button>
                          <!-- <a href="{{ route('pejabat.destroy',[$datas->id]) }}" class="btn btn-sm btn-outline-danger">
                              <i class="fa fa-trash"> </i>
                          </a> -->

                        </td>
                      </tr>

                      <?php
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <form style="display: none" action="#" method="post" id="form-delete">
          @csrf
          @method('delete')
      </form>

      @endsection

      @push('javascript')
      <script>
          function confirmDeletion(url){
              if(confirm('Anda yakin akan menghapus user ini? ')){
                  form = document.querySelector('#form-delete');
                  form.action = url;
                  form.submit();
              }
          }
      </script>
      @endpush
