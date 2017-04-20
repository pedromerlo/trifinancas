<?php

use Phinx\Seed\AbstractSeed;

class BillRecivesSeeder extends AbstractSeed
{
    const NAMES=[
        'Salario',
        'Bico',
        'Restituição do Imposto de Renda',
        'Venda de produtos usados',
        'Balsa de valores',
        'CDI',
        'TEsouro Direto',
        'Previdêcnia Privada'
    ];
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $faker= \Faker\Factory::create('pt_BR');
        $faker->addProvider($this);
        $billRecives = $this->table('bill_recives');
        $data=[];
        foreach (range(1,20) as $value){
            $data[]=[
                'date_launch'=> $faker->date(),
                'name'=> $faker->BillRecivesName(),
                'value'=> $faker->randomFloat(2,10,1000),
                'user_id' => rand(1,4),
                'created_at'=>date('Y-m-d H:i:s)'),
                'updated_at'=>date('Y-m-d H:i:s)'),
            ];
        }
        $billRecives->insert($data)->save();
    }

    public function BillRecivesName(){
        return \Faker\Provider\Base::randomElement(self::NAMES);
    }
}