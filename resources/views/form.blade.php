{!! Form::open(array('route' => 'front.fb', 'class' => '')) !!}
<div>
    <label  class="email">Your name</label>
    {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]) !!}
</div><div>
    <label  class="email">Your email</label>
    {!! Form::text('emails', null, ['class' => 'input-text', 'placeholder'=>"Your emails"]) !!}
</div><div>
    <label class="email">Comments</label>
    {!! Form::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]) !!}
</div><div class="send">
    {!! Form::submit('Send', ['class' => 'button']) !!}
</div>
{!! Form::close() !!}

