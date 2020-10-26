<form action="{{route('mail.send')}}" method="POST">
    @csrf
    Send Email
    <label>To</label>
    <input type="text" name="to_email"/>
    <input type="text" name="contact">
    <button type="submit">send</button>
</form>
