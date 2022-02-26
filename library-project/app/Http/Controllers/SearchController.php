<?php

namespace App\Http\Controllers;

use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $results = $this->searchResult(request('search'));
        return view('search/search-results', ['results' => $results]);
    }

    private function searchResult(string $query)
    {
        $user = User::where('name', 'like', '%' . $query . '%')->get();
        return $user;
    }
}
