<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Storage 파사드 추가

class UploadController extends Controller
{
    public function uploadForm(){
        return view('upload');
    }

    public function uploadFile(Request $request){
        if ($request->hasFile('file')) {
        $todate = date('Ymd');  
        // 저장할 디렉토리 경로
        $directory = 'uploads/'.$todate;
        // 저장할 디렉토리가 없으면 생성
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory, 0755, true);
        }

            $request->file('file')->store($directory); // name="file"이 strage/app/public에 저장됨.
            return view('success')->with('message', '파일이 성공적으로 업로드되었습니다.');
        }else{
            return view('success')->with('message',"업로드할 파일이 없습니다.");
        }
    
    }
}
