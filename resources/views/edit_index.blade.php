<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" href="css/app.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客管理 編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                <form class="form" action="{{ route('update',['id'=>$customer->id]) }}" method="post">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">お名前</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{$customer->name }}" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" placeholder="山田太郎" required>
                                @if($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @else
                                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">メールアドレス</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ $customer->email }}" class="form-control @if($errors->has('email')) is-invalid @endif" id="inputEmail" placeholder="test@test.co.jp" required>
                                @if($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @else
                                <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
                                @endif
                            </div>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td><button class="btn" type="submit">更新する</button></td>
                            <td><a href="{{ route('customer') }}"><button type="button" class="btn bg-red-500">一覧へ戻る</button></a></td>
                        </tr>
                    </table>
                </form>
                    
            </div>
        </div>
    </div>
</x-app-layout>