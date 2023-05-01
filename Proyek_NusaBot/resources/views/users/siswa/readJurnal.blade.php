@extends('layouts.siswa.app')

@section('content-pageTitle')
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('siswa-index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Jurnal</li>
    </ol>
  </nav>
@endsection

@section('content-body')
  <div class="p-3 rounded overflow-auto" style="background-color: #899BBD;width:100%">
    <table id="datatable" class="table table-striped bg-light rounded " style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal</th>
          <th>Kegiatan</th>
          <th>Kompetensi</th>
          <th>Gambar Kegiatan</th>
          <th>Paraf</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @foreach ($data as $item)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->tanggal_jurnal }}</td>
            <td class="kegiatan">
              <span class="kegiatan-text">{!! $item->kegiatan_jurnal !!}</span>
            </td>
            <td class="kompetensi">
              <span class="kompetensi-text">{!! $item->kompetensi_jurnal !!}</span>
            </td>
            <td>
              @if (file_exists(public_path('/storage/' . $item->gambar_kegiatan_jurnal)))
                <img src="/storage/{{ $item->gambar_kegiatan_jurnal }}" alt="" class="rounded w-100">
              @else
                <img src="{{ url('img/noImg.png') }}" alt="" class="rounded w-100">
              @endif
            </td>
            <td id="paraf">
              {!! $item->paraf_pp_jurnal == null ? $parafFalse : $parafTrue !!}
            </td>
            <td class="">
              <div class="d-flex flex-column gap-2">
                <a href="{{ $_SERVER['REQUEST_URI'] . '/' . $item->id_jurnal }}">
                  <button type="button" class="btn btn-info">
                    Detail
                  </button>
                </a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                  data-bs-target="#edit{{ $item->id_jurnal }}">
                  Edit
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#del{{ $item->id_jurnal }}">
                  Delete
                </button>
              </div>
            </td>
          </tr>

          {{-- SECTION MODAL EDIT --}}

          <div class="modal fade" id="edit{{ $item->id_jurnal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Angkatan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/angkatan/{{ $item->id_jurnal }}" method="post"> @csrf @method('PUT')
                  <div class="modal-body">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Angkatan : </span>
                      <input type="text" class="form-control" placeholder="Angkatan" name="angkatan"
                        value="{{ $item->angkatan_k }}">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- !SECTION MODAL EDIT --}}

          {{-- SECTION MODAL HAPUS --}}

          <div class="modal fade" id="del{{ $item->id_jurnal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Angkatan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/angkatan/{{ $item->id_jurnal }}" method="post"> @csrf @method('DELETE')
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- !SECTION MODAL EDIT --}}
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('content-script')
  <script>
    // var table = $('#datatable').DataTable({
    // columns: [
    //   null, null,
    //   {
    //     data : 
    //     render: function(data, type, row) {
    //       return $('#kegiatan').val()
    //     }
    //   },
    //   {
    //     render: function(data, type, row) {
    //       return $('#kompetensi').val()
    //     }
    //   },null,
    //   {
    //     render: function(data, type, row) {
    //       return $('#paraf').val()
    //     }
    //   },null
    // ]
    // })
  </script>
@endsection
