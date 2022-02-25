@extends('layouts.admin')

@section('title', 'Data User')
@section('content')

    <div class="container">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{ session('success') }}
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <table class="table table-hover" id="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
<script>
    var datatable = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'job',
                name: 'job'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searcable: false,
                width: '15%'
            },
        ]
    })

</script>

@endpush
