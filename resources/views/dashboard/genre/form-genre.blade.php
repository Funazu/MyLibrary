<form action="/dashboard/genre/create" method="POST">
    @csrf
    <div class="form-group">
        <strong>Nama</strong>
        <input type="text" id="name" name="name" class="form-control" placeholder="Input Name Here...">
    </div>
    <div class="form-group">
        <strong>Slug</strong>
        <input type="text" id="slug" name="slug" placeholder="OTOMATIS" class="form-control">
    </div>
    <hr>
    <div class="form-group">
        <button class="btn btn-primary">Kirim</button>
    </div>
</form>