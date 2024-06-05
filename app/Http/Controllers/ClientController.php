<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use App\Http\Requests\ClientPutRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class ClientController extends Controller
{
    public function __invoke()
    {
        return view(
            'components.table',
            [
                'items' => Client::all(),
                'columns' => Schema::getColumnListing('users'),
                'get_route' => 'user.get',
                'id_column' => 'id'
            ]
        );
    }

    public function register(ClientRegisterRequest $request): RedirectResponse
    {
        Auth::login(Client::create($request->validated())->make());
        return redirect('login');
    }

    public function login(ClientLoginRequest $request): RedirectResponse
    {
        Auth::logout();
        Auth::guard('client')->logout();

        if (Auth::guard('client')->attempt($request->validated(), true)) {
            $request->session()->regenerate();
            return to_route('requests');
        }

        return back()->withErrors(
            [
                'email' => __('The provided credentials do not match our records.'),
            ]
        )->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('about');
    }

    public function get(string $id)
    {
        return view('admin.page.user', ['item' => Client::find($id)]);
    }

    public function put(Request $request, ClientPutRequest $putClient): RedirectResponse
    {
        $client = Client::find($putClient->id);
        if ($request->user('client')->cannot('update', $client)) {
            abort(403);
        }

        $client->update(array_filter($putClient->validated()));

        return back();
    }
}
