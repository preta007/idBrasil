<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Movement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $account = Account::leftJoin('movements', 'movements.id_account', '=', 'accounts.id')
        ->select(['accounts.id', Movement::raw('sum( if( movements.type="debito", -movements.value, movements.value ) ) as value'), 'name'])
            ->groupBy('accounts.id', 'accounts.name') 
            ->orderByDesc('movements.id_account')       
            ->get();

        return view('account', compact('account'));
      
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
        $account = Account::findOrFail($id);
        $movement = Movement::where('id_account', $id)->get();
        $movement->each->delete();
        $account->delete();  
        return redirect()->back();
    }
}
