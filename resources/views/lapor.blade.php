<!-- View Lapor -->
@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-green-600 mb-4">Data Reports</h1>
    <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="document.getElementById('addReportForm').style.display='block'">Tambah Report</button>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-green-200">Title</th>
                <th class="py-2 px-4 bg-green-200">Description</th>
                <th class="py-2 px-4 bg-green-200">Image</th>
                <th class="py-2 px-4 bg-green-200">Pelapor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $report->title }}</td>
                    <td class="py-2 px-4">{{ $report->description }}</td>
                    <td class="py-2 px-4"><img src="{{ asset('storage/'.$report->image) }}" alt="Report Image" width="100" class="rounded"></td>
                    <td class="py-2 px-4">{{ $report->user_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="addReportForm" class="mt-4 p-4 bg-green-100 rounded shadow-lg" style="display:none;">
        <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-green-700">Title:</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-green-700">Description:</label>
                <textarea id="description" name="description" class="w-full px-3 py-2 border rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-green-700">Image:</label>
                <input type="file" id="image" name="image" class="w-full px-3 py-2 border rounded" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</div>
@endsection
