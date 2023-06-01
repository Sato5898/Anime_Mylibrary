<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            おすすめ結果画面
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">    
                <div class="p-6 text-gray-900">
                    <p>こちらのアニメはいかがですか？</p>
                    @if($total == 7)
                        <p>anime1</p>   
                    @elseif($total >= 5)
                        <p>anime2</p>
                    @elseif($total >= 3)
                        <p>anime3</p>
                    @else
                        <p>anime4</p>
                    
                    @endif
                    <button type="button" class="btn"><a href="{{ route('recommend') }}">もう一度選びなおす</a></button>
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> 
    <script src="js/my-jquery.js"></script>
</x-app-layout>