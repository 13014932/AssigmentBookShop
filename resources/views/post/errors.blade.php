<h1></h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <h2><li>{{ $error }}</li></h2>
        @endforeach
    </ul>
</div>
@endif