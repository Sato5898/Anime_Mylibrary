<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/css/app.css')}}">
<div class="back">
    <div class="container">
        <div class="content">
            <h1 class="title">Anime_Mylibrary</h1>
            <div class="menu">
                <ul>
                    <li><a class="btn btn-secondary btn-lg menu_item1" href="{{ route('login') }}">ログイン</a></li>
                    <li><a class="btn btn-secondary btn-lg menu_item2" href="{{ route('register') }}">新規登録</a></li>
                </ul>
                
            </div>
        </div>
    </div>
</div>