<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Kopdes;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('admins.kopdes')->get();
        $kopdes = Kopdes::doesntHave('admin')->get(['id', 'name']);
        $fields = collect((new User())->getFillable())
            ->reject(fn ($field) => $field === 'password')
            ->push('kopdes_name')
            ->values()
            ->all();
        
        return view('user', compact('users', 'fields', 'kopdes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request){
            $user = User::create(
                $request->safe()->only([
                    'name',
                    'email',
                    'password',
                    'role'
                ])
            );

            if ($user->role === 'admin') {
                $user->admins()->create([
                    'kopdes_id' => $request->validated('kopdes_id')
                ]);
            }
        });

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {
            $data = $request->safe()->only(['name', 'email', 'role']);
    
            if ($request->filled('password')) {
                $data['password'] = $request->password;
            }
    
            $user->update($data);
    
            if ($user->role === 'admin') {
                $user->admins()->updateOrCreate([], [
                    'kopdes_id' => $request->validated('kopdes_id'),
                ]);
            } else {
                $user->admins()->delete();
            }
        });
    
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
