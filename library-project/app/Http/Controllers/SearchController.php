<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        $results = $this->searchResult(request('search'));
        return view('search.index', ['results' => $results]);
    }

    private function searchResult(string $query)
    {
        $user = User::where('name', 'like', '%' . $query . '%')->where('name', '!=', Auth::user()->name)->get();
        return $user;
    }
}
