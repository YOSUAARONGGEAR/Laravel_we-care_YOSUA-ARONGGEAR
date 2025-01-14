<!-- View Tentang -->
@extends('layouts.master')

@section('content')
<div class="container mx-auto py-20 px-4">
    <h2 class="text-4xl font-bold text-center text-green-700 mb-8">Tentang WeCare</h2>
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <div>
            <img src="{{ asset('tentang1.jpg') }}" alt="Lingkungan Sehat" class="rounded-lg shadow-lg">
        </div>
        <div>
            <p class="text-lg text-gray-700 leading-relaxed">
                WeCare adalah platform yang bertujuan untuk meningkatkan kesadaran dan partisipasi masyarakat dalam menjaga kesehatan lingkungan. Kami percaya bahwa lingkungan yang sehat berkontribusi besar pada kualitas hidup yang lebih baik.
            </p>
            <p class="text-lg text-gray-700 leading-relaxed mt-4">
                Dengan WeCare, Anda dapat melaporkan berbagai masalah lingkungan di sekitar Anda, seperti pencemaran, penebangan liar, dan isu lingkungan lainnya. Bersama kita bisa menciptakan lingkungan yang lebih bersih dan sehat.
            </p>
        </div>
    </div>
    <div class="mt-16 grid md:grid-cols-3 gap-8">
        <div class="text-center">
            <img src="{{ asset('misi.jpg') }}" alt="Misi" class="mx-auto mb-4 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-green-700">Misi Kami</h3>
            <p class="text-gray-600">Membangun kesadaran dan aksi nyata untuk menjaga lingkungan.</p>
        </div>
        <div class="text-center">
            <img src="{{ asset('visi.jpg') }}" alt="Visi" class="mx-auto mb-4 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-green-700">Visi Kami</h3>
            <p class="text-gray-600">Menciptakan lingkungan sehat untuk generasi mendatang.</p>
        </div>
        <div class="text-center">
            <img src="{{ asset('tujuan.jpg') }}" alt="Tujuan" class="mx-auto mb-4 rounded-full shadow-md">
            <h3 class="text-xl font-semibold text-green-700">Tujuan Kami</h3>
            <p class="text-gray-600">Menghubungkan masyarakat dan pemerintah dalam menjaga lingkungan.</p>
        </div>
    </div>
</div>
@endsection
