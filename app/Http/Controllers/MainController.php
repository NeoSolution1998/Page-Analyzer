<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class MainController extends Controller
{
    public function home() {
        return view('home');
    } 

    public function index() {
        $urls = new Url();
        return view('index', compact('urls'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'url.name' => 'required|max:255|min:4'
        ]);

        $url = new Url();
        $url->name = $request->input('url.name');
        $url->save();

        return redirect()->route('urls.index')->withSuccess('Страница успешно добавлена');
    }

    public function show($id) {
        $url = Url::findOrFail($id);
        return view('show', compact('url'));
    }
}
