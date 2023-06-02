<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            おすすめ結果画面
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">    
                <div class="p-6 text-gray-900">
                    <p class="result_title">こちらのアニメはいかがですか？</p>
                    @if($genre == 1)
                        @if($total == 3)
                        <p class="result_data">anime1</p>
                        @elseif($total == 2)
                        <p class="result_data">anime5</p>
                        @else
                        <p class="result_data">anime7</p>
                        @endif

                    @elseif($genre == 2)
                        @if($total == 3)
                        <p class="result_data">anime2</p>
                        @elseif($total ==2)
                        <p class="result_data">anime8</p>
                        @else
                        <p class="result_data">anime11</p>
                        @endif

                    @elseif($genre == 3)
                        @if($total == 3)
                        <p class="result_data">anime3</p>
                        @elseif($total == 2)
                        <p class="result_data">anime6</p>
                        @else
                        <p class="result_data">anime10</p>
                        @endif

                    @else
                        @if($total == 3)
                        <p class="result_data">anime4</p>
                        @elseif($total == 2)
                        <p class="result_data">anime9</p>
                        @else
                        <p class="result_data">anime12</p>
                        @endif
                    
                    @endif
                    <button type="button" class="btn"><a href="{{ route('recommend') }}">もう一度選びなおす</a></button>
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> 
    <script src="js/my-jquery.js"></script>
</x-app-layout>