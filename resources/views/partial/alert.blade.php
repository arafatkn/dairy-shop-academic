@if (session('success'))
    <div class="alert alert-success background-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="icofont icofont-close-line-circled text-white"></i>
        </button>
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger icons-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled"></i>
        </button>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
@endif
