<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeederTest extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement("Insert into cidades (id, estado_id, nome) values (1,9,'Abadia de Goiás');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (2,13,'Abadia dos Dourados');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (3,9,'Abadiânia');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (23,18,'Acauã');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (24,21,'Aceguá');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (48,11,'Água Boa');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (49,2,'Água Branca');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (50,15,'Água Branca');");
        DB::statement("Insert into cidades (id, estado_id, nome) values (4850,25,'São Paulo');");
    }

}
