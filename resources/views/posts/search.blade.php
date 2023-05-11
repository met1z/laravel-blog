@extends('layouts.site')

@section('content')
    <h1 class="mt-2 mb-3">Результаты поиска</h1>
    @if (isset($posts) && count($posts))
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $post->title }}</h3>
                    </div>
                    <div class="card-body">
                    <img src="{{ $post->thumb ?? asset('img/default.png') }}" alt="" class="img-fluid">
                        <p class="mt-3 mb-0">{{ $post->excerpt }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="clearfix">
                            <span class="float-start">
                                Автор: {{ $post->author }}
                                <br>
                                Дата: {{ date_format($post->created_at, 'd.m.Y H:i') }}
                            </span>
                            <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-dark float-end">Читать дальше</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    {{ $posts->links() }}
    @else
        <p>По вашему запросу ничего не найдено</p>
    @endif
@endsection