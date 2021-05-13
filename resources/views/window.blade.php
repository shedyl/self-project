@extends('layout')

@section('content')
<div class='chat'>
    <div class='chat-messages'>
        <div class='chat-messages__content' id='messages'>
            Загрузка...
        </div>
        <img  src="{{ $image }}" alt="222">
    </div>
    <div class='chat-input'>
        <form method='post' id='chat-form'>
            <input type='text' id='message-text' class='chat-form__input' placeholder='Введите сообщение'> <input type='submit' class='chat-form__submit' value='=>'>
        </form>
    </div>
</div>
@endsection