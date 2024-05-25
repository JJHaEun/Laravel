{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
<h2 class="mt-4 mb-3"><b>{{$product->name}}</b></h2>
<?php
$date = date('Y-m-d',$product->created_at->timestamp)
?>
<p style="text-align: right" class="pt-2">{{$product->created_at}}</p>
<div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$product->content}}
        </div>
</div>
<a href="{{route('products.index')}}">
        <button type="button" class="btn btn-dark" style="float: right;">목록으로</button>
    </a>
@endsection