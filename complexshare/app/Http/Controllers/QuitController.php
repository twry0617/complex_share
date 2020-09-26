<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Entities\User;

class QuitController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('/quit');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function delete()
    {
        
        $user = Auth::user();
        $user->delete();

        
        session()->flash('quit_message', '退会処理が完了しました。'); 
        return redirect()->to('/home');
    }
}
