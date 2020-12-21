@extends('layouts.layout')

@section("content")
<section id="customize-app">
<div id="customize">
  <div id="choose-base">
    <h2>Pick a base color</h2>
    <div class="list-container">
      <ul class="list">
        @foreach ($blank_shirts as $blank_shirt)
          <li class="list-item">
            <div class="item-preview" style="background-image:url('{{asset($blank_shirt->image_path)}}')"></div>
            <h3>{{$blank_shirt->name}}</h3>
          </li>
        @endforeach
        
      </ul>
    </div>
  </div>
  <div id="choose-graphics">
    <h2>Pick some graphics</h2>
    <div class="list-container">
      <ul class="list">
        @foreach ($graphics as $graphic)
          <li class="list-item">
            <div class="item-preview" style="background-image:url('{{asset($graphic->image_path)}}')"></div>
            <h3>{{$graphic->name}}</h3>
          </li>
        @endforeach
        
      </ul>
    </div>
  </div>
  <div id="choose-name">
    <h2>Name your customization</h2>
    <form id="form" action={{route("custom_shirts.store")}} method="POST">
      @csrf
      @method("POST")
      <input type="text" id="name" name="name" placeholder="Type name..." minlength="6" required />
      <input type="hidden" id="image_base64" name="image_base64">
      <input type="submit" id="submit-btn" value="SAVE">
    </form>
    
  </div>
</div>
<div id="preview">
  <div class="graphics-preview"></div>
</div>

</section>
@endsection