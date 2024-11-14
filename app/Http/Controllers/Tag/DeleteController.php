<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag) {
        try {
            $tag->delete();
        } catch (\Exception $exception) {
            $errorMessage = 'Нельзя удалить этот тег так как на него ссылается товар';
            return view('error.index', compact('errorMessage'));
        }
        return redirect()->route('tag.index');
    }
}
