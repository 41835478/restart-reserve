<?php

namespace App\Http\Controllers\Admin;

use App\Reserve;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function index(Request $request) {

        // 获取排序条件
        $orderColumn = $request->get('sort_up', $request->get('sort_down', 'created_at'));
        $direction   = $request->get('sort_up') ? 'asc' : 'desc' ;

        $reserves = Reserve::orderBy($orderColumn, $direction)->paginate(999);;

        return view('admin.reserve.list', compact('reserves', 'query'));
    }
//
//    public function show($id) {
//        $reserves = Reserve::find($id);
//        return response()->json($reserves);
//    }

//    public function store(Request $request) {
//        $reserves = new Reserve;
//        $reserves->fill($request->all());
//
//        $reserves->save();
//
//        return response()->json(['id' => $reserves->id]);
//    }

    public function verify(Request $request, $id){
        $reserve = Reserve::find($id);

        if($reserve->order_no == $request->input('order_no')) {
            $reserve->status = 'complete';
            $reserve->save();
            return response()->json(['id' => $reserve->id]);
        } else {
            return response()->json(['id' => $reserve->id, 'error' => '核销码不正确']);
        }
    }

    public function update(Request $request, $id) {
        $reserves = Reserve::find($id);
        $reserves->fill($request->all());

        $reserves->save();

        return response()->json(['id' => $reserves->id]);
    }

    public function destroy($id)
    {
        $reserves = Reserve::find($id);

        $reserves->delete();
        return response()->json(['id' => $id]);
    }
}
