<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user) {
        $data = $request->validated();
        //dd($data);
        $user->update($data);
        return redirect()->route('user.show', $user->id);
    }
}
