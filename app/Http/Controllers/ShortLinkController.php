<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
    }

    public function store(Request $request)
    {
        $input['ip'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $input['link'] = $request->link;
        $input['code'] = str_random(6);
        $urlcode = $input['code'];
        $ban = DB::table('banned')->where('url', $input['link'])->first();;

        $validator = Validator::make($request->all(), [
            'link' => ['required', 'url'],
        ]);
        
        if($input['link'] == null) {
            return redirect('/')
                ->with('error', '긴 URL을 입력하십시오.');
        } else if ($validator->fails()) {
            return redirect('/')
                ->with('error', '사용할 수 없는 링크입니다.');
        }  else if($ban != null) {
            return redirect('/')
                ->with('error', '차단된 주소입니다  .');
        } else {
            ShortLink::create($input);
            return redirect('/')
                ->with('success', $urlcode);
        }
    }

    public function hit(Request $request)
    {
        $shorten_code = $request->input('shorten_code');
        $find = ShortLink::where('code', $shorten_code)->first();

        $validator = Validator::make($request->all(), [
            'shorten_code' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('hit')
                ->with('error', '조회할 수 없는 링크입니다.');
        } else {
            return redirect('hit')
                ->with('success', $find->hit);
        }
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        if($code == "") {
            return view('shortenLink', compact('shortLinks'));
        } else if($code == "hit") {
            return view('hit');
        } else if($code == "terms") {
            return view('terms');
        } else if($find == "") {
            return redirect('/')
                ->with('error', '존재하지 않는 링크입니다.');
        } else {
            ShortLink::where('id', $find->id)->update(['hit'=>$find->hit + 1]);
            return redirect($find->link);
        }
    }
}
