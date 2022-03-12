<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Model\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $comics = [
            [
                'nome' => 'L Attacco Dei Giganti',
                'comprati' => 34,
                'usciti' => 34,
                'letti' => 34,
                'finito' => 1,
                'costo_singolo' => 4.9,
                'costo_totale' => 167,
                'image' => '',
            ],            
            [
                'nome' => 'The Promised Neverland',
                'comprati' => 20,
                'usciti' => 20,
                'letti' => 20,
                'finito' => 1,
                'costo_singolo' => 5.9,
                'costo_totale' => 118,
                'image' => '',
            ],
            [
                'nome' => "Slam Dunk",
                'comprati' => 20,
                'usciti' => 20,
                'letti' => 20,
                'finito' => 1,
                'costo_singolo' => 7,
                'costo_totale' => 140,
                'image' => '',
            ],
            [
                'nome' => "Rocky Joe",
                'comprati' => 13,
                'usciti' => 13,
                'letti' => 13,
                'finito' => 1,
                'costo_singolo' => 8,
                'costo_totale' => 104,
                'image' => '',
            ],
            [
                'nome' => "Death Note",
                'comprati' => 12,
                'usciti' => 12,
                'letti' => 12,
                'finito' => 1,
                'costo_singolo' => 4.9,
                'costo_totale' => 59,
                'image' => '',
            ],
            [
                'nome' => "La Fenice",
                'comprati' => 12,
                'usciti' => 12,
                'letti' => 12,
                'finito' => 1,
                'costo_singolo' => 12,
                'costo_totale' => 144,
                'image' => '',
            ],
            [
                'nome' => "Neun",
                'comprati' => 6,
                'usciti' => 6,
                'letti' => 6,
                'finito' => 1,
                'costo_singolo' => 7.5,
                'costo_totale' => 45,
                'image' => '',
            ],
            [
                'nome' => "Star Wars Lost Stars",
                'comprati' => 3,
                'usciti' => 3,
                'letti' => 3,
                'finito' => 1,
                'costo_singolo' => 5,
                'costo_totale' => 15,
                'image' => '',
            ],
            [
                'nome' => "Al Tempo di Papà",
                'comprati' => 1,
                'usciti' => 1,
                'letti' => 1,
                'finito' => 1,
                'costo_singolo' => 22,
                'costo_totale' => 22,
                'image' => '',
            ],
            [
                'nome' => "My Hero Academia",
                'comprati' => 30,
                'usciti' => 31,
                'letti' => 31,
                'finito' => 0,
                'costo_singolo' => 4.3,
                'costo_totale' => 133.3,
                'image' => '',
            ],
            [
                'nome' => "Asadora",
                'comprati' => 5,
                'usciti' => 5,
                'letti' => 5,
                'finito' => 0,
                'costo_singolo' => 7.5,
                'costo_totale' => 37.5,
                'image' => '',
            ],
            [
                'nome' => "20th Century Boys",
                'comprati' => 2,
                'usciti' => 2,
                'letti' => 2,
                'finito' => 0,
                'costo_singolo' => 14.9,
                'costo_totale' => 29.8,
                'image' => '',
            ],
            [
                'nome' => "One Piece",
                'comprati' => 65,
                'usciti' => 92,
                'letti' => 65,
                'finito' => 0,
                'costo_singolo' => 4.3,
                'costo_totale' => 395.6,
                'image' => '',
            ],
            [
                'nome' => "Berserk",
                'comprati' => 10,
                'usciti' => 40,
                'letti' => 10,
                'finito' => 0,
                'costo_singolo' => 5.5,
                'costo_totale' => 220,
                'image' => '',
            ],
            [
                'nome' => "DragonBall Full Color",
                'comprati' => 8,
                'usciti' => 32,
                'letti' => 8,
                'finito' => 0,
                'costo_singolo' => 6.9,
                'costo_totale' => 220.8,
                'image' => '',
            ],
            [
                'nome' => "Chainsaw Man",
                'comprati' => 6,
                'usciti' => 9,
                'letti' => 6,
                'finito' => 0,
                'costo_singolo' => 4.9,
                'costo_totale' => 44.1,
                'image' => '',
            ],
        ];

        $i=0;

        foreach ($comics as $comic) {
            $newComic = new Comic();
            $newComic->nome = $comic['nome'];
            $newComic->comprati = $comic['comprati'];
            $newComic->usciti = $comic['usciti'];
            $newComic->letti = $comic['letti'];
            $newComic->finito = $comic['finito'];
            $newComic->costo_singolo = $comic['costo_singolo'];
            $newComic->costo_totale = $comic['costo_totale'];
            $newComic->image = $comic['image'];
            $nome = "$newComic->nome-$i";
            $newComic->slug = Str::slug($nome, '-');
            $newComic->fill($comic);
            $newComic->save();
            $i=$i+1;
        }
    }
}
