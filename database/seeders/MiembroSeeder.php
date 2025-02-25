<?php

namespace Database\Seeders;

use App\Models\miembro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     private function createEventosMiembro(miembro $miembro, int $numEventos){
        $tipos = collect(['mundano','extremo','religioso','demoniaco','???']);
        $niveles = collect(['0','1','2','3','4','5','6','7','8','9','10']);

        $eventos = collect(config("eventos"))->shuffle()->take($numEventos);

        $eventos->each(fn($evento_acudido) => $miembro->eventos()->create([
            "evento" => $evento_acudido,
            "tipo" => $tipos->random(),
            "nivel" => $niveles->random()

        ]));
    }

    public function run(): void
    {
        Miembro::factory()->count(50)->create()->each(function (miembro $miembro){
            $numEventos = rand(0,5);
            if ($numEventos > 0)
                $this->createEventosMiembro($miembro, $numEventos);
        });

    }
}
