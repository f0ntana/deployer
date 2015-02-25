@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p><strong>Whoops!</strong> Ocorreu um erro com a sua solicitação!</p>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif