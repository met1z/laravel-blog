@extends('layouts.site', ['title' => $post->title])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1>{{ $post->title }}</h1>
                </div>
            <div class="card-body">
                <img src="{{ $post->image ?? asset('img/default.jpg') }}" alt="" class="img-fluid">
                <p class="mt-3 mb-0">{{ $post->body }}</p>
            </div>
                <div class="card-footer">
                    <div class="clearfix">
                        <span class="float-start">
                            Автор: {{ $post->author }}
                            <br>
                            Дата: {{ date_format($post->created_at, 'd.m.Y H:i') }}
                        </span>
                        @auth
                            @if (auth()->id() == $post->author_id)
                                <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-dark float-end">Редактировать</a>
                                <form 
                                    action="{{ route('post.destroy', ['id' => $post->post_id]) }}" 
                                    method="post" 
                                    onsubmit="return confirm('Удалитьэтот пост?')" 
                                    class="float-end me-3"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection