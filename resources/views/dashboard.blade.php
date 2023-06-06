<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表
        </h2>
    </x-slot>
    <div class="mt-6 mb-6 set_wrap">
        <a href="{{ route('set') }}" class="set"><button type="button" class="set_btn btn bg-red-600">値の更新</button></a>
        @if (session('flash_message_add'))
            <div class="flash_message bg-success text-center py-3 my-0 ">
                {{ session('flash_message_add') }}
            </div>
        @endif
        <form class="form pr-6 pt-4" action="{{ route('add_schedule') }}" method="POST">
            @csrf
            <input type="submit" class="btn add_button" value="番組表に追加" onclick='return confirm ("値の更新は行いましたか？")'>
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
    <script src="{{asset('/js/index.js')}}"></script>
</x-app-layout>
