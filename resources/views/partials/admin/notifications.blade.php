<div class="notifications">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success my-1">{{ session('message') }}</div>
    @endif
</div>
