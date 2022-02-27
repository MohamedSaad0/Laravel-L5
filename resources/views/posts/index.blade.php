@extends("site_layouts.app")
@section('content')
            <a href="posts/create">Add New Post</a>        
            <table border=2 class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created_at</th>
                </tr>
                @foreach ($posts as $post)
                <tr>
                    <td> {{ $post->id }} </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->description }} </td>
                    <td> {{ $post->created_at }} </td>
                    <td><a href="/posts/{{ $post->id }}">Show</a></td>
                    <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
                    <td>
                        <form action="/posts/{{ $post->id }}" method="post">
                            @csrf
                            @method("DELETE")
                             <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                    <!-- <td><a href="/create">Create</a></td> -->
                </tr>
                @endforeach
            </table>   
@endsection