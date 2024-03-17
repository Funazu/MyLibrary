<!-- Modal -->
@foreach ($authors as $author)
<form action="/dashboard/author/edit/{{ $author->slug }}" method="POST">
@csrf
@method('PUT')
<div class="modal fade" id="author-edit-{{ $author->id }}" tabindex="-1"
    aria-labelledby="author-edit-{{ $author->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="author-edit-{{ $author->id }}Label">Edit Author {{ $author->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" id="name-edit-{{ $author->id }}" name="name" value="{{ $author->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Slug</strong>
                    <input type="text" id="slug-edit-{{ $author->id }}" name="slug" value="{{ $author->slug }}" class="form-control">
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

<script>
    const nameEdit{{ $author->id }} = document.querySelector("#name-edit-{{ $author->id }}");
    const slugEdit{{ $author->id }} = document.querySelector("#slug-edit-{{ $author->id }}");
    
    nameEdit{{ $author->id }}.addEventListener('change', function() {
        fetch('/dashboard/author/checkSlug?name=' + nameEdit{{ $author->id }}.value)
        .then(response => response.json())
        .then(data => slugEdit{{ $author->id }}.value = data.slug)
    });
</script>
@endforeach