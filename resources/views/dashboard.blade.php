<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表
        </h2>
    </x-slot>
    <div class="mt-6 mb-6">
        <form class="form pr-6 " action="{{ route('add_schedule') }}" method="POST">
            @csrf
            <input type="submit" class="btn" value="番組表に追加">
        </form>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 wrap">
            @foreach($summaries as $summary)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4 summary_container">
            <p class="anime_title">{{ $summary->anime_name }}</p>
                <img  class="image" src="{{ asset('/img/' . $summary->image_color) }}" alt="">   
                
                <div class="summary_box">
                    <a class="next_detail" href="{{ route('detail', ['id'=>$summary->id]) }}">詳細を見る</a>
                </div>   
            </div>
            @endforeach
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> 
    <script src="js/my-jquery.js"></script>
</x-app-layout>
