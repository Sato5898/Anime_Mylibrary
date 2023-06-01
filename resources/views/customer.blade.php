<x-app-layout>
    <x-slot name="header">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                <div class="p-6 text-gray-900">
                    <table class="customer_table">
                        <tr>
                            <th class="th-name">{{('名前')}}</th>
                            <th class="th-oauth">{{'認証方法'}}</th>
                            <th class="th-email">{{('メールアドレス')}}</th>
                            <th class="th-pass">{{('パスワード')}}</th>
                            
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name}}</td>
                            <td>{{ $customer->oauth_type }}</td>
                            <td>@if($customer->email == NULL)
                                    {{'なし'}}
                                @else
                                    {{ $customer->email}}
                                @endif
                                </td>
                            <td class="td-pass">{{ $customer->password}}</td>
                            <td><a href="{{ route('edit_index', ['id'=>$customer->id]) }}"><button type="button" class="btn btn-outline-dark">編集</button></a></td>
                            <td>
                                <form class="delete_form" action="{{ route('delete', ['id'=>$customer->id]) }}" method="POST">
                                @csrf
                                <input type="submit" class="btn btn-outline-dark" value="削除" onclick='return confirm ("本当に削除してもよろしいですか？")'>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/js/index.js')}}"></script>
</x-app-layout>
