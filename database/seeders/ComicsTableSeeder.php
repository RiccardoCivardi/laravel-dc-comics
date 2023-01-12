<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // prendo i dati utilizzando il metodo config() e richiamando il file php che contiene i dati (i dati sono nella cartella config)

        // al posto di lanciare php artisan db:seed --class=ComicsTableSeeder ho messo il seeder dentro a DatabaseSeeder.php così da lanciare tutti i seeder con php artisan db:seed

        $array_comics=config('comics');

        // dump($array_comics);

        foreach ($array_comics as $comic) {
            // dopo aver scritto il nome del model do invio per importare lo use App\Models\Comic; in alto
            $new_comic= new Comic();
            $new_comic->title=$comic['title'];
            $new_comic->slug=Comic::generateSlug($new_comic->title);
            $new_comic->description=$comic['description'];
            $new_comic->thumb=$comic['thumb'];
            $new_comic->price=$comic['price'];
            $new_comic->series=$comic['series'];
            $new_comic->sale_date=$comic['sale_date'];
            $new_comic->type=$comic['type'];

            // dump($new_comic);

            $new_comic->save();
        }

    }
}
