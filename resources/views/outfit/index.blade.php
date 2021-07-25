@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <div class="subtitle">Sorting:
                        <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                            <fieldset>
                                <legend>Sort by:</legend>
                                <div>
                                    <label>Type</label>
                                    <input type="radio" name="sort_by" value="type" @if('type'==$sort) checked @endif>
                                </div>
                                <div>
                                    <label>Size</label>
                                    <input type="radio" name="sort_by" value="size" @if('size'==$sort) checked @endif>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Direction:</legend>
                                <div>
                                    <label>Asc</label>
                                    <input type="radio" name="dir" value="asc" @if('asc'==$dir) checked @endif>
                                </div>
                                <div>
                                    <label>Desc</label>
                                    <input type="radio" name="dir" value="desc" @if('desc'==$dir) checked @endif>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Sort</button>
                            <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                        </form>
                        <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                            <fieldset>
                                <legend>Filter by:</legend>
                                <div class="form-group">
                                    <select name="master_id" class="form-control" value="{{old('master_id')}}">
                                        @foreach ($masters as $master)
                                        <option value="{{$master->id}}" @if($dewfaultMasters==$master->id) selected @endif>
                                            {{$master->name}} {{$master->surname}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Select Master from the list.</small>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                        </form>
                        <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                            <fieldset>
                                <legend>Search by type:</legend>
                                <div class="form-group">
                                <input type="text" class="form-control" name="s" value="{{$s}}">
                                </div>
                            </fieldset>
                            <button type="submit" name="do_search" value="1" class="btn btn-primary">Search type</button>
                            <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="subtitle">Outfits list:</div>
                    <ul class="list-group">

                        @forelse ($outfits as $outfit)
                        <li class="list-group-item">

                            <div class="list-container">
                                <div class="list-container__content">
                                    <span class="list-container__content__outfit">Type: {{$outfit->type}} <br> Size: {{$outfit->size}}</span>
                                    <span class="list-container__content__master">{{$outfit->masterOfOutfit->name}} {{$outfit->masterOfOutfit->surname}}</span>
                                </div>
                                <div class="list-container__buttons">
                                    <a href="{{route('outfit.edit',[$outfit])}}" class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty 
                            <h3> no Results </h3>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
    @endsection
