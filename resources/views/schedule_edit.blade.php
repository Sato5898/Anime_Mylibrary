<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            番組表編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div>
    <label>番組名</label>
    <small class="text-red">※必須</small>
    <select type="text" class="form-control" name="anime_name" required>
        <option disabled style='display:none;' @if (empty($anime->id)) selected @endif>選択してください</option>
        @foreach($broadcasts as $pref)
            <option value="{{ $pref->anime_id }}" @if (isset($anime->id) && ($anime->id === $pref->anime_id)) selected @endif>{{ $anime->anime_name }}</option>
        @endforeach
    </select>
</div>
                <a href="{{ route('schedule') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

