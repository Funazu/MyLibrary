<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->slug }}</td>
                <td>
                    <form action="/dashboard/author/delete/{{ $author->slug }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger mb-1"
                            onclick="return confirm('Are you sure you want to delete')"><i
                                class="fas fa-trash"></i></button>
                        {{-- <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                            data-target="#show-{{ $catatanSiswa->id }}">
                        </button> --}}
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                            data-target="#author-edit-{{ $author->id }}">
                            <i class="fas fa-pen"></i>
                        </button>
                        {{-- <a href="{{ " /tamu/" . $siswa->uniqid }}" class="btn btn-success mb-1"><i
                                class="fas fa-eye"></i></a> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>