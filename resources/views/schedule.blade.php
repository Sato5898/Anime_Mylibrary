<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My番組表
        </h2>
    </x-slot>

    <div class="mt-6">
        <form class="form" action="{{ route('clear')}}" method="post">
            @csrf
            <input class="btn btn-primaryexit" type="submit" value="番組表をクリア">
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="schedule_table">
                            <tr>
                                <th>時間/曜日</th>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                                
                            </tr>
                            <th>23:00～23:30</th>
                            @foreach($schedules as $sch)
                                @if($sch->id <=7)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>23:30～24:00</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=8 && $sch->id < 15)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>24:00～24:30</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=15 && $sch->id < 22)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>24:30～25:00</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=22 && $sch->id < 29)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>25:00～25:30</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=29 && $sch->id < 36)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>25:30～26:00</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=36 && $sch->id < 43)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                            </tr>
                                <th>26:00～26:30</th>
                            @foreach($schedules as $sch)
                                @if($sch->id >=43 && $sch->id < 50)
                                    @if($sch->anime_name != 'null')
                                        <td>{{$sch->anime_name}}</td>
                                    @elseif($sch->anime_name == 'null')
                                        <td></td>
                                    @endif
                                @endif
                            @endforeach
                            <tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/js/index.js')}}"></script>
</x-app-layout>
