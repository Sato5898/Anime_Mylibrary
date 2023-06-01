<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{auth()->user()->name}}さんがお気に入り登録しているアニメ
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">    
                <div class="p-6 text-gray-900">
                    <table class="favorite_table">
                        <tr>
                            <th class="th_anime_name">{{'アニメ名'}}</th>
                            <th></th>
                        </tr>
                        @foreach(auth()->user()->animes as $anime)
                        <tr>
                            <td><span class="favorite_data">{{$anime->anime_name}}</span></td>
                            <td>
                                <form class="delete_form" action="{{ route('detach', ['id'=>$anime->id]) }}" method="POST">
                                    @csrf
                                    <input type="submit" class=" favo_button btn btn-outline-dark" value="お気に入りから削除" onclick='return confirm ("本当に削除してもよろしいですか？")'>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> 
    <script src="js/my-jquery.js"></script>
</x-app-layout>