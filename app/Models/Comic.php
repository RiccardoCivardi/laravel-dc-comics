<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','thumb','price','series','sale_date','type'];


    // funzione pubblica statica che genera lo slug, devo importare use Illuminate\Support\Str; in alto

    public static function generateSlug($string){
        $slug = Str::slug($string, '-');
        /*
            - salvare lo slug originale
            - controllare se esiste
            - generarne uno con in aggiunta un contataore
            -- se esiste generarne un'altro e così via fino a che se ne trova uno non esistente
        */
        $original_slug = $slug;
        $c = 1;
        $house_exists = Comic::where('slug',$slug)->first();
        while($house_exists){
            $slug = $original_slug . '-' . $c;
            $house_exists = Comic::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}
