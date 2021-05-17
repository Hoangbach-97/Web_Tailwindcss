@extends('layouts.app')
@section('noidung')
<div class="w-4/5 m-auto text-left">
<div class="py-15">
    {{-- Biến  posts trả về từ hàm show --}}
    <h1 class="text-6xl">
        {{$posts->title}}
    </h1>
</div>

<div class="w-4/5  pt-10">
<span class="text-gray-500">
Đăng bởi <span class="text-gray-700 font-bold italic">{{$posts->user->name}}</span> {{date('d-m-Y')}}
                                                         {{-- , strtotime($post->created_at) --}}
</span>
</div>
<p class="text-xl  text-gray-600 pt-8 pb-10 font-light leading-8">
{{$posts->description}}
</p>


</div>
@endsection