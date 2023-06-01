<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$details->anime_name}}詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if (session('status'))<div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">{{ session('status') }}</div>@endif
                    <table class="detail">
                        <tr>
                            <th class="detail_title">ジャンル</th>
                            <td class="detail_data">{{ $details->genre }}</td>
                        </tr>
                        <tr>
                            <th class="detail_title">公式サイト</th>
                            <td class="detail_data">{{ $details->official_page }}</td>
                        </tr>
                        <tr>
                            <th class="detail_title">放送局</th>
                            <td class="detail_data">{{ $details->broadcast}}</td>
                        </tr>
                        <tr>
                            <th class="detail_title">放送時間</th>
                            <td class="detail_data">{{ $details->on_air_date }}曜日</td>
                        </tr>
                        <tr>
                            <th class="detail_title">放送時間</th>
                            <td class="detail_data">{{ $details->on_air_time }}</td>
                        </tr>
                        <tr>
                            <th class="detail_title">配信サービス</th>
                            <td class="detail_data">{{ $details->streaming }}</td>
                        </tr>
                        <tr>
                            <th class="detail_title">お気に入りに追加</th>
                            <td class="detail_data">
                                <form method="post" action="{{ route('add_favorite',['id'=>$details->id]) }}">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn">追加</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="detail_button_space mt-6">
                <button class="btn detail_button" type="button" onclick="location.href='{{ route('dashboard') }}' ">一覧へ戻る</button>
            </div>
        </div>
    </div>
</x-app-layout>