@extends('layouts.app')
@section('noidung')
<div class="w-4/5 m-auto text-left">
<div class="py-15 ">
    <h1 class="text-5xl">Create Posts</h1>
</div>
</div> 
{{-- Nếu có bất kì lỗi nào --}}
@if($errors->any())
<div class="w-4/5 m-auto">
<ul class="">
    {{-- Lấy toán bộ và lặp  --}}
@foreach($errors->all() as $error)
<li class="w-1/5 mb-4 text-gray-50 bg-red-500 rounded-xl py-4 text-center">

    {{ $error}}
</li>
@endforeach
</ul>

</div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/save" method="post" enctype ="multipart/form-data">
    @csrf
    <input
     type="text"
     name="title"
     placeholder="Enter title"
     {{-- border-bottom-width:2px --}}
     class="bg-gray-0 block border-b-2 w-full h-20 text-6xl outline-none" >
     {{-- text-6xl: font-size:3.5rem line-height:1 --}}
  <textarea 
  name="description"
  placeholder="Enter description"
  class="bg-gray-0 block py-20 w-full h-60 text-xl border-b-2 outline-none">
        
  </textarea>
<div class="pt-15 bg-gray-lighter">
<label class="w-44 flex flex-col items-center px-2 py-3
bg-white-rounded-lg shadow-lg tracking-wide  uppercase border border-blue cursor-pointer rounded-3xl">
<span class="mt-2 text-base leading normal ">Select a file</span>
<input type="file" name="image" class="hidden">
</label>
</div>
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