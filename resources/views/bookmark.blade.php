<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お気に入りリスト
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-4">
                <div class="p-6 text-gray-900">
                @foreach ($animes as $article)
                    <article class="article-item">
                    <div class="article-title"><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></div>
                    <div class="article-info">
                        {{ $article->created_at }}｜{{ $article->user->name }}
                    </div>
                    <div class="article-control">
                        @if (!Auth::user()->is_bookmark($article->id))
                        <form action="{{ route('bookmark.store', $article) }}" method="post">
                            @csrf
                            <button>お気に入り登録</button>
                        </form>
                        @else
                        <form action="{{ route('bookmark.destroy', $article) }}" method="post">
                            @csrf
                            @method('delete')
                            <button>お気に入り解除</button>
                        </form>
                        @endif
                    </div>
                </article>
                @endforeach
                {{$animes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>