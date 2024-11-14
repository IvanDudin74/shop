<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Color $color) {
        try {
            $color->delete();
        } catch (\Exception $exception) {
            $errorMessage = 'Нельзя удалить этот цвет так как на него ссылается товар';
            return view('error.index', compact('errorMessage'));
        }
        return redirect()->route('color.index');
    }
}
