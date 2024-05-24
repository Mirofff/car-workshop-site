<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteStuffRequest;
use App\Http\Requests\PostStuffRequest;
use App\Http\Requests\PutStuffRequest;
use App\Models\Stuff;
use Illuminate\Support\Facades\Hash;

class StuffController extends Controller
{
    public function __invoke()
    {
        return view(
            'pages.admin.handbooks.stuff.index',
            [
                "stuff" => Stuff::all(),
            ]
        );
    }

    public function post(PostStuffRequest $req)
    {
        Stuff::create($req->validated());
        return back();
    }

    public function put(PutStuffRequest $req)
    {
        $validated = array_filter($req->validated());
        $validated['password'] = Hash::make($validated['password']);
        Stuff::whereId($validated['id'])->update($validated);
        return back();
    }

    public function delete(DeleteStuffRequest $req)
    {
        $validated = $req->validated();
        Stuff::whereId($validated['id'])->delete();
        return back();
    }
}
