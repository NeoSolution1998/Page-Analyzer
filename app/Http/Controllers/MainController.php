<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\UrlCheck;
use Illuminate\Support\Facades\Http;
use DiDom\Document;

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
        $name = $request->input('url.name');

        if (Url::where('name', $name)->exists()) {
            flash('Страница уже существует')->error();
            return redirect()->route('urls.index');
        } else {
            $url = new Url();
            $url->name = $name;
            $url->save();
            flash('Страница успешно добавлена');
            return redirect()->route('urls.index');
        }
    
    }

    public function show($id) {
        $url = Url::findOrFail($id);
        return view('show', compact('url'));
    }

    public function checks(Request $request, $id) {
        $urls = Url::findOrFail($id);
        $response = Http::get($urls->name);
        $response_body = $response->body();


        $status = $response->status();
        $document = new Document($response_body);
        $h1 = optional($document->first('h1'))->text();
        $title = optional($document->first('title'))->text(); 
        $description = optional($document->first('meta[name=description]'))->attr('content');

        $url = new UrlCheck();

        $url->checks;
        $url->url_id = $id;
        $url->status_code = $status;
        $url->h1 = $h1;
        $url->title = $title;
        $url->description = $description;
        $url->save();
        flash('Страница успешно проверена');
        return redirect()->route('urls.show', ['id' => $id]);
    }
}
