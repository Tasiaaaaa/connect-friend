<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $loc = session()->get('locale');
        App::setLocale($loc);

        $query = User::query();

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('hobbies')) {
            $hobbies = explode(',', $request->input('hobbies'));
            foreach ($hobbies as $hobby) {
                $query->where('hobbies', 'LIKE', '%' . $hobby . '%');
            }
        }

        $dataUser = $query->get();

        return view('home', compact('dataUser'));
    }

}
