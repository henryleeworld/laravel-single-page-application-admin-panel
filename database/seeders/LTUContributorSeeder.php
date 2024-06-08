<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Outhebox\TranslationsUI\Enums\RoleEnum;
use Outhebox\TranslationsUI\Models\Contributor;

class LTUContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Contributor::create([
            'name' => __("Administrator"),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::owner,
        ]);
    }
}
