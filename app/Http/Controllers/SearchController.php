<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    
    /**
     * @Handle an incoming request show list results search
     * @param  \Illuminate\Http\Request  $request
     * @return view('showResultSearch')
     */
    public function search(Request $request)
    {
        $user = Auth::user();
        $search = Subject::where('subject_name', 'like', '%' . $request->search . '%')->get();
        return view('showResultSearch', compact('search', 'user'));
    }
}
