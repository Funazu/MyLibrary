<!-- Modal -->
@foreach ($genres as $genre)
<form action="/dashboard/genre/edit/{{ $genre->id }}" method="POST">
@csrf
@method('PUT')
<div class="modal fade" id="genre-edit-{{ $genre->id }}" tabindex="-1"
    aria-labelledby="genre-edit-{{ $genre->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="genre-edit-{{ $genre->id }}Label">Edit Genre {{ $genre->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" id="name-edit" name="name" value="{{ $genre->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Slug</strong>
                    <input type="text" id="slug-edit" name="slug" value="{{ $genre->slug }}" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
</form>
@endforeach

<script>
    const nameEdit = document.querySelector('#name-edit');
    const slugEdit = document.querySelector('#slug-edit');
    
    nameEdit.addEventListener('change', function() {
        fetch('/dashboard/genre/checkSlug?name=' + nameEdit.value)
        .then(response => response.json())
        .then(data => slugEdit.value = data.slug)
    });
</script>