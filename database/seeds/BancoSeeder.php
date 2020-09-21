<?php

use App\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(database_path("import/bancos.csv")));
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        foreach($csv as $row) {
            Banco::create([
                "id_comercial" => $row["ID"],
                "nombre" => $row["nombre"],
            ]);
        }
    }
}
