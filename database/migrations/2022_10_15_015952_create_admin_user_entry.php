<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminUserEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminUser = User::create([
            'name' => 'Игорь Смирнов',
            'email' => 'igor-smirnov-94@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'), // password
            'remember_token' => Str::random(10),
        ]);
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '',
        ]);

        $adminUser->roles()->attach($adminRole->id);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
