<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Category $category) {
        try {
            $category->delete();
        } catch (\Exception $exception) {
            $errorMessage = 'Нельзя удалить эту категорию так как
            на нее ссылается товар';
            return view('error.index', compact('errorMessage'));
        }
        return redirect()->route('category.index');
    }
}
