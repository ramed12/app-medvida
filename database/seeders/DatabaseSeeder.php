<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\TypeDocument;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\User::factory(10)->create();

        User::create([
            "nome" => "José Alves",
            "cpf" => "05312755150",
            "password" => "josealves",
            "email" => "josealves@boahost.com.br",
            "telefone" => "65993072186",
            'status'   => 1,
            "nascimento" => null,
        ]);


        Administrator::create([
            'name' => 'Flávio Hayashida',
            'email' => 'fhayashida@afdsolution.tec.br',
            'cpf' => '007.955.311-76',
            'password' => 'jhmcma130902'
        ]);

        Administrator::create([
            'name' => 'José Alves',
            'email' => 'josealves@boahost.com.br',
            'cpf' => '053.127.551-50',
            'password' => 'josealves'
        ]);

        $typedocumento = array('CRM', 'OAB', 'CNH', 'RG', 'CPF', 'Certidão de Nascimento', 'Certidão de Casamento', 'Certidão de União Estável', 'Atestado de Conclusão do Curso', 'Diploma do Curso');
        foreach ($typedocumento as $data) :
            TypeDocument::updateOrCreate(
                [
                    'name' => $data,
                    'status' => 1
                ]
            );
        endforeach;
    }
}
