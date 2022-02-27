@extends("site_layouts.app")
@section('content')
        <form>
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="text" class="form-control"  value="{{ $id }}" name="id"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ $title}}" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <input type="text" class="form-control" value="{{ $description }}" name="body">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" value="{{ $created_at }}" name="title">
            </div>
            <div class="mb-3 form-check">
            </div>
        </form>
@endsection

