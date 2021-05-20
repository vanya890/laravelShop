@extends('layouts.master')
@section('title', 'Категории')
@section('content')
    <div style="display: flex; flex-wrap: wrap;">
        @foreach($categories as $category)
            <div style="margin: 3rem; border: 1px solid rgba(0,0,0,0.1); padding: 1rem">
                <a href=" {{ route('category', $category->code) }} ">
                    @if($category->image != '')
                        <img style="max-height: 10vh" src="{{URL::to('/').'/storage/'.$category->image}}"
                             alt="{{ $category->name }}">
                    @endif
                    <h2>{{ $category->name }}</h2>
                </a>
                <p>
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
