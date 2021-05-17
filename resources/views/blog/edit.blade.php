@extends('layouts.app')
@section('noidung')
<div class="w-4/5 m-auto text-left">
<div class="py-15 ">
    <h1 class="text-5xl">Update Posts</h1>
</div>
</div> 
@if($errors->any())
<div class="w-4/5 m-auto">
<ul class="">
@foreach($errors->all() as $error)
<li class="w-1/5 mb-4 text-gray-50 bg-red-500 rounded-xl py-4 text-center">

    {{ $error}}
</li>
@endforeach
</ul>

</div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/blog/{{$post->slug}}/update" method="post" enctype ="multipart/form-data">
    @csrf
    {{-- This will be transfer post method --}}
    @method('PUT')
    <input
     type="text"
     name="title"
     value="{{$post->title}}"
     class="bg-gray-0 block border-b-2 w-full h-20 text-6xl outline-none" >
  <textarea 
  name="description"
  class="bg-gray-0 block py-20 w-full h-60 text-xl border-b-2 outline-none">
 {{$post->description}}
  </textarea>

<div>
   <button
    type="submit"
    class="py-4  uppercase border border-blue w-44 mt-10 bg-white-rounded-lg shadow-lg bg-blue-500 rounded-3xl font-extrabold text-gray-50">
    Upload Post
    </button>
    </div>
    </form>
</div>


@endsection