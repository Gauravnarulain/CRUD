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
            <form method="post" action="{{route('posts.store')}}">
                @csrf
                <div class="form-group">
                    <label for="">Title <span class="text text-danger">{{ $errors->post->first('title') }}</span></label>
                    <input type="text" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group pt-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>SrNo</td>
                        <td>Title</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data))
                    @foreach($data as $key=> $value)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td><a href="{{ route('posts.edit',$value->id) }}"> {{$value->title}} </a></td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->description}}</td>
                        <td>
                            <form method="post" action="{{ route('posts.destroy',$value->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p class="alert alert-warning text-center p-2">no data were found</p>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection