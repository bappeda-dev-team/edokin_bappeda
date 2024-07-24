@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Perangkat Daerah</h1>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Perangkat Daerah</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode OPD</th>
                                <th>Nama OPD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_opd as $opd)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $opd['kode_opd'] ?? 'N/A' }}</td>
                                    <td>{{ $opd['nama_opd'] ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No data available.</td>
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
