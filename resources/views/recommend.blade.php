<x-app-layout>
    <x-slot name="header">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
        おすすめ
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900">
                    <form id="form_schedule" method="post" action="{{ route('recommend_result')}}">
                        @csrf
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                            <h3 class="font-bold">質問1. 見たいジャンルは？<br></h3>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio1" value="1">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">ジャンル1</span>
                                </label>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio1" value="2">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">ジャンル2</span>
                                </label>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio1" value="3">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">ジャンル3</span>
                                </label>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio1" value="4">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">ジャンル4</span>
                                </label>
                        </div>


                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                            <h3 class="font-bold">質問2. ...........？<br></h3>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio2" value="1">
                                        <span class="ECM_RadioInput-DummyInput"></span>
                                        <span class="ECM_RadioInput-LabelText">はい</span></label>
                                <label class="ECM_RadioInput">
                                    <input class="ECM_RadioInput-Input" type="radio" name="radio2" value="0">
                                        <span class="ECM_RadioInput-DummyInput"></span>
                                        <span class="ECM_RadioInput-LabelText">いいえ</span></label>
                        </div>

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                            <h3 class="font-bold">質問3. ...........？<br></h3>
                            <label class="ECM_RadioInput">
                                <input class="ECM_RadioInput-Input" type="radio" name="radio3" value="1">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">はい</span></label>
                            <label class="ECM_RadioInput">
                                <input class="ECM_RadioInput-Input" type="radio" name="radio3" value="0">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">いいえ</span></label>
                            
                        </div>

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                            <h3 class="font-bold">質問4. ......？<br></h3>
                            <label class="ECM_RadioInput">
                                <input class="ECM_RadioInput-Input" type="radio" name="radio4" value="1">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">はい</span></label>
                            <label class="ECM_RadioInput">
                                <input class="ECM_RadioInput-Input" type="radio" name="radio4" value="0">
                                    <span class="ECM_RadioInput-DummyInput"></span>
                                    <span class="ECM_RadioInput-LabelText">いいえ</span></label>
                        </div>
                        <div class="snap-center">    
                            <button type="submit" class="btn btn-success">送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>