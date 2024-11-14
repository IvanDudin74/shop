<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(User $user) {
        try {
            DB::beginTransaction();
            $user->reviews()->delete();
            $user->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $errorMessage = 'Нельзя удалить этого пользователя так как на него ссылается заказ';
            return view('error.index', compact('errorMessage'));
        }
        return redirect()->route('user.index');
    }
}
