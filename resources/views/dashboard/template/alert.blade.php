@if ($errors->any())
<div class="alert alert-danger">
    <strong>Error Message:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('successPost'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successPost') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('successEdit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successEdit') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('successDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('successDelete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif