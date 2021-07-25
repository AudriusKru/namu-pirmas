@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Outfit</div>

                <div class="card-body">
                    <form method="POST" action="{{route('outfit.store')}}">
                    <div class="form-group">    
                        <label>Type:</label>
                        <input type="text" class="form-control" name="outfit_type" value="{{old('outfit_type')}}">
                        <small class="form-text text-muted">Enter outfits type.</small>
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <input type="text" class="form-control" name="outfit_color" value="{{old('outfit_color')}}">
                        <small class="form-text text-muted">Which color.</small>
                    </div>
                    <div class="form-group">
                        <label>Size:</label>
                        <input type="text" class="form-control" name="outfit_size" value="{{old('outfit_size')}}">
                        <small class="form-text text-muted">Outfit size.</small>
                    </div>
                    <div class="form-group">
                        <label>About:</label>
                        <textarea name="outfit_about" class="form-control" id="summernote" value="{{old('outfit_about')}}"></textarea>
                        <small class="form-text text-muted">About outfit.</small>
                    </div>
                    <div class="form-group">
                        <select name="master_id" class="form-control" value="{{old('master_id')}}">
                            @foreach ($masters as $master)
                            <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Select Master from the list.</small>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
