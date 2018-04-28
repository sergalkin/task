@extends('layouts.template')
@section('content')
    <div id="content" class="box clearfix">
        <div id="comments-container" class="container">
            @if($comments->isEmpty())
                <h2 class="welcoming-h2">Еще не было добавлено ни одного отзыва. Будьте первым!</h2>
            @else
                @foreach($comments as $comment)
                    <div class="comments-block">
                        <div>
                            <h2>{{$comment->user_name}}</h2>
                        </div>
                        <div>
                            <span>{{$comment->created_at->format("H:i")}}</span>
                            <span>{{$comment->created_at->format("d.m.Y")}}</span>
                        </div>
                    </div>
                    <p>{!! $comment->user_comment !!}</p>
                @endforeach
            @endif
            <hr>
        </div>
        <? echo Form::open(['action' => 'CommentsController@store', 'method' => 'post'])?>
        <div id="form" class="box">
            <div class="container">
                <div class="area">
                    <h2>Оставить комментарий</h2>
                    <p>Ваше имя</p>
                    <input name="user_name" type="text" value="{{old('user_name')}}" required/>
                    <p>Ваш комментарий</p>
                    <textarea name="user_comment" required>{{old('user_comment')}}</textarea>
                    <br>
                    <input type="button" class="button" id="button" value="Отправить">
                </div>
            </div>
        </div>
        <? echo Form::close()?>
    </div>
    <script>
        $(document).ready(function () {
            $('#button').on('click', SubForm);

            function SubForm() {
                var dateRaw = new Date();
                var time = ((dateRaw.getHours() < 10 ? '0' : '') + dateRaw.getHours()) + ":" + ((dateRaw.getMinutes() < 10 ? '0' : '') + dateRaw.getMinutes());
                var date = dateRaw.toLocaleString().split(',')[0];
                $.ajax({
                    type: 'POST',
                    url: '{{URL::route('comments.store')}}',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'user_name': $('input[name=user_name]').val(),
                        'user_comment': $('textarea[name=user_comment]').val(),
                        success: function () {
                            if ($('.welcoming-h2').length) {
                                $("<div class='comments-block'>" +
                                    "<div style='margin-right: 3px'>" +
                                    "<h2>" + $('input[name=user_name]').val() + "</h2>" +
                                    "</div>" +
                                    "<div style='margin-right: 3px; width: 108.4px'>" +
                                    "<span style='margin-right: 13px'>" + time + "</span>" +
                                    "<span>" + date + "</span>" +
                                    "</div>" +
                                    "</div>" +
                                    "<p>" + $('textarea[name=user_comment]').val() +
                                    "</p>").insertAfter($(".welcoming-h2"));
                                $('.welcoming-h2').remove();
                            } else {
                                $("<div class='comments-block'>" +
                                    "<div style='margin-right: 3px'>" +
                                    "<h2>" + $('input[name=user_name]').val() + "</h2>" +
                                    "</div>" +
                                    "<div style='margin-right: 3px; width: 108.4px'>" +
                                    "<span style='margin-right: 13px'>" + time + "</span>" +
                                    "<span>" + date + "</span>" +
                                    "</div>" +
                                    "</div>" +
                                    "<p>" + $('textarea[name=user_comment]').val() +
                                    "</p>").insertBefore($(".comments-block").first());
                            }
                        }
                    },
                })
            }
        });
    </script>
@endsection