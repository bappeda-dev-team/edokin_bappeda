@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Pegawai</h1>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Pegawai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nama Pangkat</th>
                                <th>Nama Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($filteredData as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee['nip'] ?? 'N/A' }}</td>
                                    <td>{{ $employee['nama'] ?? 'N/A' }}</td>
                                    <td>{{ $employee['jabatan'] ?? 'N/A' }}</td>
                                    <td>{{ $employee['pangkat'] ?? 'N/A' }}</td>
                                    <td>{{ $employee['unit_name'] ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>
@endsection
