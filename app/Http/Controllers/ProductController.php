<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    private $product;

    public function __construct(product $product){ // 해당 메서드는 생성자가 정의 되어 있는 메서드.
        // 메서드 이름이 잘못되어 있을 경우 생성자 호출되지 않음.
        $this->product = $product;
    }

    public function index($seq = 1){
        // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
        $products =  Product::where('USE_YN', '!=', 'N')->latest()->paginate(15);
        // products/index.blade 에 $products 를 보내줍니다
        return view('products.index', compact('products')); //
    }
    


    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Request 에 대한 유효성 검사입니다, 다양한 종류가 있기에 공식문서를 보시는 걸 추천드립니다.
        // 유효성에 걸린 에러는 errors 에 담깁니다.
        $validatedData  = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        $this->product->create($validatedData );
        return redirect()->route('products.index');
    }
    



    // 상세 페이지
    public function show(product $product){
    // show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
        return view('products.show', compact('product'));
    }



    // 수정하기
    public function edit(product $product){
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, product $product){
        $validatedData  = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product has been logically deleted.');
    }



    // 삭제하기(논리적 삭제)
    public function delete_yn(product $product){
        $product->update(['USE_YN' => 'N']);
        
        return redirect()->route('products.index');
    }

    // 삭제하기(물리적 삭제)
}
