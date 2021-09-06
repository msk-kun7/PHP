@extends('layouts.app')
@section('content')
       
<main>
<div class="tweet">
    <div class="tweet-top">
        <div class = "tweet-header">
            <h6>ホーム</h6>
        </div>
        <div class= "tweet-body">
            <form class="acssece" action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                @endif
                <input id="text" type="text" class="form-control" name='body' placeholder="いまどうしてる？">
                {{ csrf_field() }} 
                <!-- ↑これがないとLarabelではエラーが出る -->

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="tubuyaku">
                    <input type="submit" class="btn btn-light" value="つぶやく">
                </div>
            </form>
        </div>
    </div>
    <div class="tweet-history">
        <table class="post-comment">
            @foreach($posts as $post)
                <tr>
                    <td>{{ $users->find($post->user_id)->name }}</td>
                    <td class="td-date">{{ $post->created_at }}</td>
                </tr>
                <tr class="tr-border">
                    <td>{{ $post->body }}</td>
                    <td class="td-text">
                    @if($users->find($post->user_id)->id === Auth::user()->id)
                        <a href="{{route('posts.destory', ['id' => $post->id])}}" class="delete-btn">削除</a>
                    @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</main>
@endsection
