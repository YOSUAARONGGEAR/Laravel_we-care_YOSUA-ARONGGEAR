@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Admin Index</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Deskripsi</th>
                        <th class="py-3 px-4 text-left">Foto</th>
                        <th class="py-3 px-4 text-left">Lokasi</th>
                        <th class="py-3 px-4 text-left">User ID</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($kegiatans as $item)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $item->nama }}</td>
                        <td class="py-3 px-4">{{ $item->deskripsi }}</td>
                        <td class="py-3 px-4"><img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-24 h-24 object-cover rounded"></td>
                        <td class="py-3 px-4">{{ $item->lokasi }}</td>
                        <td class="py-3 px-4">{{ $item->user_id }}</td>
                        <td class="py-3 px-4 flex space-x-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showEditForm({{ $item->id }})">Edit</button>
                            <form method="POST" action="{{ route('admins.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Edit Form Modal -->
<div id="editFormModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Kegiatan</h2>
        <form id="editForm" method="POST" action="">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editFormId">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" name="nama" id="editFormNama" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="editFormDeskripsi" class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>
            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700">Lokasi</label>
                <input type="text" name="lokasi" id="editFormLokasi" class="w-full px-4 py-2 border rounded-lg">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</div>

<script>
    function showEditForm(id) {
        // Ambil data item yang akan diedit (Anda bisa menggunakan AJAX untuk ini)
        const item = @json($kegiatans->keyBy('id'));

        // Isi form dengan data item
        document.getElementById('editFormId').value = item[id].id;
        document.getElementById('editFormNama').value = item[id].nama;
        document.getElementById('editFormDeskripsi').value = item[id].deskripsi;
        document.getElementById('editFormLokasi').value = item[id].lokasi;

        // Perbarui atribut action dari form
        document.getElementById('editForm').action = `/admin/${item[id].id}`;

        // Tampilkan modal edit
        document.getElementById('editFormModal').classList.remove('hidden');
    }
</script>
@endsection
