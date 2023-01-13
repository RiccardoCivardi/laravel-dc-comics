<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
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
    public function store(ComicRequest $request)
    {
        // validazione

        // la request validate la metto nel file ComicRequest che creo con questo comando
        // php artisan make:request ComicRequest
        // poi la metto in store(...) e la importo


        // $request->validate([
        //     'title'=>'required|max:200|min:5',
        //     'description'=>'max:1000',
        //     'thumb'=>'required|max:255|min:10',
        //     'price'=>'required|decimal:0,2',
        //     'series'=>'required|max:100|min:5',
        //     'sale_date'=>'required',
        //     'type'=>'max:100'
        // ],
        // [
        //     'title.required'=>'Il titolo è un campo obbligatorio',
        //     'title.max'=>'Il titolo può essere lungo massimo :max caratteri',
        //     'title.min'=>'Il titolo deve essere di almeno :min caratteri',
        //     'description.max'=>'La decrizione può essere lunga massimo :max caratteri',
        //     'thumb.required'=>'La URL dell\'immagine è un campo obbligatorio',
        //     'thumb.max'=>'La URL dell\'immagine può essere lunga massimo :max caratteri',
        //     'thumb.min'=>'La URL dell\'immagine deve essere di almeno :min caratteri',
        //     'price.required'=>'Il prezzo è un campo obbligatorio',
        //     'price.decimal'=>'Il prezzo può avere massimo 2 decimali',
        //     'series.required'=>'La serie è un campo obbligatorio',
        //     'series.max'=>'La serie può essere lunga massimo :max caratteri',
        //     'series.min'=>'La serie deve essere di almeno :min caratteri',
        //     'sale_date.required'=>'La data d\'usita è un campo obbligatorio con questo formato yyyy-mm-dd',
        //     'type.max'=>'Il tipo può essere lungo massimo :max caratteri'
        // ]);


        // per vedere cosa arriva dal create faccio il dump di $request ma i dati sono sporchi
        // dd($request);
        // per prenderli puliti utilizzarle il metodo all() e salvarli in una nuova variabile
        $form_data=$request->all();
        // dd($form_data);
        // dd($form_data['title']);

        $new_comic= new Comic();
        // $new_comic->title=$form_data['title'];
        // $new_comic->slug=Comic::generateSlug($new_comic->title);
        // $new_comic->description=$form_data['description'];
        // $new_comic->thumb=$form_data['thumb'];
        // $new_comic->price=$form_data['price'];
        // $new_comic->series=$form_data['series'];
        // $new_comic->sale_date=$form_data['sale_date'];
        // $new_comic->type=$form_data['type'];

        // per fare il fill() aggiungo lo slug che va generato ai dati in ingresso $form_data che poi fillerò
        $form_data['slug'] = Comic::generateSlug($form_data['title']);

        // il metodo fill() prende ciò che arriva e lo assegna a ciò che ho messo nella variabile protetta $fillable nel Model
        $new_comic->fill($form_data);

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
    public function edit(Comic $comic)
    {
        // dd($comic);

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComicRequest $request, Comic $comic)
    {
        $form_data = $request->all();
        // dump($comic);
        // dd($form_data);

        // modifico lo slug generandone uno nuovo se e solo se il titolo è stato modifcato
        if($form_data['title'] != $comic->title){
            $form_data['slug'] = Comic::generateSlug($form_data['title']);
        } else {
            $form_data['slug'] = $comic->slug;
        }

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        //faccio il redirect a index passando in sessione l'eliminazione per mostrare l'alert
        return redirect()->route('comics.index')->with('deleted', "Il fumetto $comic->title è stato eliminato correttamente");
    }
}
