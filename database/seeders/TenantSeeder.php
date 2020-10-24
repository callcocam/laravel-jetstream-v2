<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::query()->delete();

        $tenants = [
            [
                'name'=> 'Jetstream v2',
                'domain'=>'laravel-jetstream-v2.sis.test',
                'database'=>'tenancy',
            ],
            [
                'name'=> 'Jetstream v3',
                'domain'=> 'laravel-jetstream-v3.test',
                'database'=>'tenancy',
            ],
            [
                'name'=> 'Jetstream v4',
                'domain'=>'laravel-jetstream-v4.test',
                'database'=>'landlord',
                'prefix'=>'app',
            ]
        ];
        foreach ($tenants as $value):
            Tenant::factory(1)->create($value);
        endforeach;
    }
}
