@extends('dashboard.master')
@section('title', 'edit category')
@section('content')
<div class="row">
    @include('dashboard.partials.top-nav-bar')
</div>
<div class="row">
    @include('dashboard.partials.side-nav-bar')
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 card" style="margin-top: 2%;">
            <h3>Edit category</h3>
            <hr>
            <form class="form" role="form" action="/category/{{ $category->id }}/edit" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Category Description</label>
                    <textarea type="description" class="form-control" name="description" value="">{{ $category->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="background-color: #8899a6 ! important; border: none;">
                    <i class="fa fa-btn fa-user"></i> Update Category
                    </button>
                </div>
            </form>
            
            
        </div>
    </div>
</div>
@endsection