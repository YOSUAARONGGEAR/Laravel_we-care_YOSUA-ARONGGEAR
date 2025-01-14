@extends('layouts.master')

@section('content')
<div class="row">
    @foreach($kegiatan as $item)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ $item->foto }}" class="card-img-top" alt="{{ $item->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                    <p class="card-text"><small class="text-muted">{{ $item->lokasi }}</small></p>
                    <a href="{{ route('kegiatan.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
