{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')

    <h2 class="mt-4 mb-3">Product Create</h2>

    {{-- 유효성 검사에 걸렸을 경우 --}}
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('products.store')}}" method="post">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea rows="10" cols="40" name="content" class="form-control" id="content" autocomplete="off"></textarea>
        </div>
        <button type="" class="btn btn-primary">Submit</button>
    </form>
@endsection

