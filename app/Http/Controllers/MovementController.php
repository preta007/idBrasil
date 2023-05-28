<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Movement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $account = Account::find($id);
        $movement = Movement::where('id_account', $id)->get();

        return view('movement', compact('account','movement'));
      
    }

    public function add()
    {
        return view('addAccount');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'value' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);
     
        $account = Account::create([
            'name'=> $request->get('name'),
            'id_user'=> Auth::user()->id,
        ]);

        $movement = Movement::create([
            'value'=> $request->get('value'),
            'description'=> $request->get('description'),
            'type'=> $request->get('type'),
            'id_account'=> $account->id,
        ]);

        return redirect()->route('account');       
        
    }

    public function destroy($id)
    {
        $movement = Movement::findOrFail($id);
        $movement ->delete();  
        return redirect()->back();
    }
}
