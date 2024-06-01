{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Product List</h2>

    <a href="{{route('products.create')}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>


    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
        {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력해줍니다. --}}
        @foreach ($products as $key => $product)
            <tr>
                <th scope="row">{{$key+1 + (($products->currentPage()-1) * 10)}}</th>
                <td><a href="{{route('products.show', $product->seq)}}">{{$product->name}}</a></td>
                <td>{{$product->created_at}}</td>
                <td><a href="{{route('products.edit',$product)}}">Edit</a>
                /<a href="#" onclick="event.preventDefault(); if(confirm('정말로 삭제하시겠습니까?')) { 
    document.getElementById('delete-form').submit(); }">Delete</a>

<form id="delete-form" action="{{ route('products.del_yn', $product) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- 라라벨 기본 지원 페이지네이션 --}}
    {!! $products->links() !!}
@endsection