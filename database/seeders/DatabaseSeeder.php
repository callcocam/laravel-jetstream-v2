<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Database\Seeders;

use App\Models\Team;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tenant::checkCurrent()
            ? $this->runTenantSpecificSeeders()
            : $this->runLandlordSpecificSeeders();




    }

    public function runTenantSpecificSeeders()
    {
         \App\Models\User::factory(1)->create()->each(function ($user){
             $user->ownedTeams()->save(Team::forceCreate([
                 'user_id' => $user->id,
                 'name' => explode(' ', $user->name, 2)[0]."'s Team",
                 'personal_team' => true,
             ]));
         });
    }

    public function runLandlordSpecificSeeders()
    {
        $this->call(TenantSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(MenuSeeder::class);
        \App\Models\User::factory(1)->create()->each(function ($user){
            $user->ownedTeams()->save(Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0]."'s Team",
                'personal_team' => true,
            ]));
        });
    }
}
