<!-- resources/views/welcome.blade.php -->
@extends('layouts.master')

@section('content')
    <!-- Hero Section -->
    <section class="bg-green-700 text-white text-center py-20">
        <h2 class="text-4xl font-bold">Peduli Lingkungan, Peduli Kesehatan</h2>
        <p class="mt-4 text-lg">Laporkan isu lingkungan di sekitar Anda dan jadikan lingkungan lebih sehat!</p>
        <a href="{{ route('lapor.index') }}" class="mt-6 inline-block bg-white text-green-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">Laporkan Sekarang</a>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-green-700">Fitur Unggulan</h3>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                    <img src="{{ asset('image1.jpg') }}" alt="Fitur 1" class="mx-auto">
                    <h4 class="mt-4 font-bold text-lg">Pelaporan Cepat</h4>
                    <p class="text-gray-600 text-center">Laporkan masalah lingkungan dengan mudah dan cepat.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                    <img src="{{ asset('image2.jpg') }}" alt="Fitur 2" class="mx-auto">
                    <h4 class="mt-4 font-bold text-lg">Pantauan Real-Time</h4>
                    <p class="text-gray-600 text-center">Pantau status laporan Anda secara langsung.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
                    <img src="{{ asset('image3.jpg') }}" alt="Fitur 3" class="mx-auto">
                    <h4 class="mt-4 font-bold text-lg">Komunitas Aktif</h4>
                    <p class="text-gray-600 text-center">Bergabung dengan komunitas peduli lingkungan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="bg-green-100 py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-green-700">Galeri Kegiatan</h3>
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($kegiatan as $item)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama }}" class="rounded-lg mb-2">
                        <p class="font-semibold text-green-700">{{ $item->nama }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-green-700">Hubungi Kami</h3>
            <p class="mt-4 text-gray-600">Email: support@wecare.com | Telepon: (021) 123-4567</p>
        </div>
    </section>
@endsection
