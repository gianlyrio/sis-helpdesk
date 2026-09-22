<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'TI / Suporte', 'code' => 'TI'],
            ['name' => 'Sistema & Software', 'code' => 'SOFT'],
            ['name' => 'Recursos Humanos', 'code' => 'RH'],
            ['name' => 'Infraestrutura & Manutenção', 'code' => 'INFRA'],
       ];

       foreach ($departments as $dept) {
            Departament::create($dept);
    }
}