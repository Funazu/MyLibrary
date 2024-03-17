@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-center">

    <div class="col-xl-4 col-md-12 mb-2">
        @include('dashboard.template.alert')
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-text"><strong>Menambahkan Daftar Author</strong></h4>
                <hr>
                @include('dashboard.author.form-author')
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-md-12 mb-2">
        <div class="card shadow">
            <div class="card-body">
                @include('dashboard.author.table-author')
            </div>
        </div>
    </div>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    
    name.addEventListener('change', function() {
        fetch('/dashboard/author/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@include('dashboard.author.modal-author')
@endsection