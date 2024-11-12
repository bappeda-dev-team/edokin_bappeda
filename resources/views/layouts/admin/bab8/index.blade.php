@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>BAB VIII</h1>
    </div>
    <a href="{{ route('bab8.create') }}">
        <button class="btn btn-primary">Tambah <i class="fas fa-plus-circle"></i></button>
    </a>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>BAB 8</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Bab</th>
                                    {{-- <th>Jenis</th> --}}
                                    <th>Periode</th> <!-- Kolom Tahun ditambahkan di sini -->
                                    <th>Kode OPD</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($bab8 as $bab_8)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $bab_8->nama_bab }}</td>
                                    {{-- <td>{{ $bab_8->jenis->jenis ?? 'N/A' }}</td> --}}
                                    <td>{{ $bab_8->tahun->tahun ?? 'N/A' }}</td>
                                    {{-- <td>{{ $bab_4->kode_opd->kode_opd ?? 'N/A' }}</td> --}}
                                    <td>
                                        @php
                                        // Ensure that urusan_opd is being processed correctly
                                            $kodeOpds = collect($urusan_opd['results'] ?? [])->firstWhere('kode_opd', $bab_8->kode_opd);
                                        @endphp
                                        {{ $kodeOpds['kode_opd'] ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('bab8.show', $bab_8->id) }}" class="btn btn-info" data-id="{{ $bab_8->id }}"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('bab8.edit', $bab_8->id) }}" class="btn btn-warning mx-2">Edit <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('bab8.destroy', $bab_8->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mx-2">Hapus <i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
