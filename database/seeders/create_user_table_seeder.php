<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class create_user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = 1234;
        $user->parent_id = 0;
        $user->is_active = true;
        $user->user_status = true;
        $user->lang = 'en';
        $user->save();
    }
}
