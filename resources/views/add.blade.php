<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アニメ登録フォーム
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">    
                <form class="form" action="{{ route('add_insert') }}" method="post">
                {{ csrf_field() }}
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputAnimeName" class="col-sm-2 col-form-label">アニメ名</label>
                            <div class="col-sm-10">
                                <input type="text" name="anime_name"  class="form-control @if($errors->has('anime_name')) is-invalid @endif" id="inputAnimeName" placeholder="anime1">
                                @if($errors->has('anime_name'))
                                <p class="alert alert-denger">{{ $errors->first('anime_name') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputGenre" class="col-sm-2 col-form-label">ジャンル</label>
                            <div class="col-sm-10">
                                <input type="text" name="genre"  class="form-control @if($errors->has('genre')) is-invalid @endif" id="inputGenre" placeholder="ジャンル1">
                                @if($errors->has('genre'))
                                <p class="alert alert-denger">{{ $errors->first('genre') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputImageColor" class="col-sm-2 col-form-label">イラスト(.pngまで記述)</label>
                            <div class="col-sm-10">
                                <input type="text" name="image_color"  class="form-control @if($errors->has('image_color')) is-invalid @endif" id="inputImageColor" placeholder="black.png">
                                @if($errors->has('image_color'))
                                <p class="alert alert-denger">{{ $errors->first('image_color') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputOfficialPage" class="col-sm-2 col-form-label">公式サイト</label>
                            <div class="col-sm-10">
                                <input type="text" name="official_page"  class="form-control @if($errors->has('official_page')) is-invalid @endif" id="inputOfficialPage" placeholder="サイト1">
                                @if($errors->has('official_page'))
                                <p class="alert alert-denger">{{ $errors->first('official_page') }}</p>   
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputBroadcast" class="col-sm-2 col-form-label">放送局</label>
                            <div class="col-sm-10">
                                <input type="text" name="broadcast"  class="form-control @if($errors->has('broadcast')) is-invalid @endif" id="inputBroadcast" placeholder="テレビ局1">
                                @if($errors->has('broadcast'))
                                <p class="alert alert-denger">{{ $errors->first('broadcast') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputOnAirDate" class="col-sm-2 col-form-label">放送曜日</label>
                            <div class="col-sm-10">
                                <input type="text" name="on_air_date"  class="form-control @if($errors->has('on_air_date')) is-invalid @endif" id="inputOnAirDate" placeholder="水">
                                @if($errors->has('on_air_date'))
                                <p class="alert alert-denger">{{ $errors->first('on_air_date') }}</p> 
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputOnAirTime" class="col-sm-2 col-form-label">放送時間</label>
                            <div class="col-sm-10">
                                <input type="text" name="on_air_time"  class="form-control @if($errors->has('on_air_time')) is-invalid @endif" id="inputOnAirTime" placeholder="23:00~23:30">
                                @if($errors->has('on_air_time'))
                                <p class="alert alert-denger">{{ $errors->first('on_air_time') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputStreaming" class="col-sm-2 col-form-label">動画配信サービス</label>
                            <div class="col-sm-10">
                                <input type="text" name="streaming"  class="form-control @if($errors->has('streaming')) is-invalid @endif" id="inputStreaming" placeholder="サービス1,サービス2">
                                @if($errors->has('streaming'))
                                <p class="alert alert-denger">{{ $errors->first('streaming') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn" type="submit">登録する</button>
                </form>   
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> 
    <script src="js/my-jquery.js"></script>
</x-app-layout>