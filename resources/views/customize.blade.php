@extends('layouts.layout')

@section("content")
<section id="customize-app">
<div id="choose">
  <div id="choose-base">
    <h2>Pick a base color</h2>
    <div class="color-list-container ">
      <ul class="color-list">
        @foreach ($blank_shirts as $blank_shirt)
          <li class="color-item">
            <div class="color-preview" style="background-image:url('{{asset($blank_shirt->image_path)}}')"></div>
            <h3>{{$blank_shirt->name}}</h3>
          </li>
        @endforeach
        
      </ul>
    </div>
  </div>
  <div id="choose-graphics"></div>
</div>
<div id="preview"></div>

</section>
@endsection