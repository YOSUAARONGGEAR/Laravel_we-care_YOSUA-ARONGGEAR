@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-gray-800 text-white p-4 rounded-t-lg">
            <h3 class="text-lg font-semibold">Create Kegiatan</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="nama" name="nama" required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                    <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-gray-700">Foto</label>
                    <input type="file" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="foto" name="foto" required>
                </div>
                <div class="mb-4">
                    <label for="lokasi" class="block text-gray-700">Lokasi</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="lokasi" name="lokasi" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
