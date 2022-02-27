@extends("site_layouts.app")
@section('content')
        <form action="/posts" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" value="{{ old('title') }}" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mb-3 form-check">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        @include("shared.errors")
@endsection