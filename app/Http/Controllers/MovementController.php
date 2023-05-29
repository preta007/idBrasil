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

        return view('movement.movement', compact('account','movement'));
      
    }

    public function add($id)
    {
        $account = Account::find($id);
        return view('movement.addMovement', compact('account'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'value' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);
     
        $movement = Movement::create([
            'value'=> $request->get('value'),
            'description'=> $request->get('description'),
            'type'=> $request->get('type'),
            'id_account'=> $request->get('id_account'),
        ]);

        return redirect()->route('movement', $request->get('id_account'));       
        
    }

    public function edit($id)
    {
        $movement = Movement::find($id);

        return view('movement.editMovement', compact('movement'));

    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => ['required'],
            'value' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);


        $movement = Movement::find($id);
        $movement->fill($request->all());
        $movement->save();

        return redirect()->route('movement', $request->get('id_account'));    
    }

    public function destroy($id)
    {
        $movement = Movement::findOrFail($id);
        $movement ->delete();  
        return redirect()->back();
    }
}
