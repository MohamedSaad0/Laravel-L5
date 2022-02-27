@extends("site_layouts.app")
@section('content')
        <form action="/posts/{{$id}}" method="post">
            @csrf
            @method("PATCH")
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="text" class="form-control"  value="{{ $id }}" name="id"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ $title }}" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <input type="text" class="form-control" value="{{ $description }}" name="description">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" value="{{ $created_at }}" name="created_at">
            </div>
            <div class="mb-3 form-check">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                    @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
            </ul>
        </div>
        @endif
@endsection