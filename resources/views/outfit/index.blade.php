@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    <div class="subtitle">Sorting:</div>
                        <form action="{{route('outfit.index')}}" method="get" class="sort-form">
                        <fieldset>
                        <legend>Sort by:</legend>
                        <div>
                        <label>Type</label><input type="radio" name="sort_by" value="type" checked>
                        </div>
                        <div>
                        <label>Size</label><input type="radio" name="sort_by" value="size">
                        </div>
                        </fieldset>
                        <fieldset>
                        <legend>Direction:</legend>
                        <div>
                        <label>Asc</label><input type="radio" name="dir" value="asc" checked>
                        </div>
                        <div>
                        <label>Desc</label><input type="radio" name="dir" value="desc">
                        </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Sort</button>
                        <a href="{{route('outfit.index')}}" class="btn btn-primary">Clear</a>
                        </form>
                        </div>
                        
                        <div class="card-body"> 
                          <div class="subtitle">Outfits list:</div>
                                <ul class="list-group">
                                    @foreach ($outfits as $outfit)
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
                                    @endforeach
                                </ul>
                            
                </div>
            </div>
        </div>
    </div>
    @endsection
