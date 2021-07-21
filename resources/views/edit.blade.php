@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <form action="{{ route('posts.update',$post->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Title <span class="text text-danger">{{ $errors->post->first('title') }}</span></label>
                    <input type="text" value="{{$post->title}}" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" value="{{$post->description}}" name="description" class="form-control">
                </div>
                <div class="form-group pt-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection