<form method="POST" id="form_upload" action="{{ route('upload.file') }}" enctype="multipart/form-data">
    @csrf
    <img src="" alt="" id="img_preview">
    <div class="form-group">
        <input name="text" class="form-control" placeholder="Title"/>
    </div>
    <div class="form-group">
        <input type="file" id="fileUpload" class="form-control">
        <input type="hidden" name="base64" id="inputBase64">
    </div>
    <button type="button" id="send_data" class="btn">Upload & Save</button>
</form>
