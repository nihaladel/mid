<?php

namespace App\Http\Controllers;
use App\Models\Amount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmountController extends Controller
{
    public function index(){
        $amounts=Amount::all();
        $val=0;
        $btn_val="Add Task";
        $tbl_val="Table Task";
       // $amounts = DB::table('amounts')->get();
        return view('show',compact('amounts'))
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }

    public function store(Request $request)
    {
        
        //dd($request);لاكتشاف مشكلة معينة 
    //    DB::table('amounts')->insert([
    //         'name'=>$request -> name,
    //         'created_at'=>now()
            
    //     ]);
        $amount = new Amount();
        $amount->name = $request->name;
        $amount->save();

        return redirect()->back()
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }

    public function destroy($id)
    {
        
        Amount::where('id',$id)->delete();
        return redirect()->back()
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }
}
