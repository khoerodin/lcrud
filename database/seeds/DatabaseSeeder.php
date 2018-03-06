<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Un Guard model
        Model::unguard();

        // disable fk constrain check
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Apakah benar Anda akan melakukan refresh migrasi sebelum melakukan seeding? ini akan membuat ulang semua tabel dan mengahpus semua data yang telah ada.')) {

            // Call the php artisan migrate:refresh using Artisan
            $this->command->call('migrate:refresh');
            $this->command->warn("Database telah dibersihkan, memulai dari database kosong.");
        }

        $this->command->warn("Melakukan seeding Laratrust.");
        $this->call(LaratrustSeeder::class);

        // Tentukan jumlah artikel dan tag
        $numberOfArticleTag = $this->command->ask('Berapa jumlah artikel dan tag yang diinginkan ?', 20);
        $this->command->info("Membuat {$numberOfArticleTag} artikel dan {$numberOfArticleTag} tag, setiap artikel memiliki satu tag dan sebaliknya.");

        // Membuat artikel dan tag
        $articleTag = factory(App\ArticleTag::class, intval($numberOfArticleTag))->create();
        $this->command->info('Artikel dan tag berhasil dibuat!');

        $this->command->info("Yup! Database telah di-seeding.");

        $this->command->warn('Berikut informasi Loginnya:');
        $this->command->info('Email: superadministrator@app.com, Password: secret');
        $this->command->info('Email: administrator@app.com, Password: secret');
        $this->command->info('Email: user@app.com, Password: secret');
        $this->command->info('Email: cru_user@app.com, Password: secret');

        // enable back fk constrain check
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Re Guard model
        Model::reguard();        
    }
}
