<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->paginate(4);

        // dd($comics);

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // per vedere cosa arriva dal create faccio il dump di $request ma i dati sono sporchi
        // dd($request);
        // per prenderli puliti utilizzarle il metodo all() e salvarli in una nuova variabile
        $form_data=$request->all();
        // dd($form_data);
        // dd($form_data['title']);

        $new_comic= new Comic();
        $new_comic->title=$form_data['title'];
        $new_comic->slug=Comic::generateSlug($new_comic->title);
        $new_comic->description=$form_data['description'];
        $new_comic->thumb=$form_data['thumb'];
        $new_comic->price=$form_data['price'];
        $new_comic->series=$form_data['series'];
        $new_comic->sale_date=$form_data['sale_date'];
        $new_comic->type=$form_data['type'];

        // dump($new_comic);

        $new_comic->save();

        // reindirizzo alla show dell'elemento appena salvato
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // con il metodo findOrFail() posso evitare il controllo per l'abort(404) in quando se è null lancia la pagina 404
        // volendo posso saltare questo passaggio scrivendo show(Comic $comic)
        // $comic= Comic::findOrFail($id);

        // dd($comic);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
