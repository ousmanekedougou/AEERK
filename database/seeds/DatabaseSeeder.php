<?php

use App\Model\Admin\Tag;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use App\Model\Admin\Social;
use App\Model\Admin\Category;
use App\Model\Admin\Info;
use App\Model\Admin\Permission;
use App\Model\Admin\Option;
use App\Model\Admin\Role_admin;
use App\Model\Admin\Solde;
use App\Model\User\User;
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
           Info::create(
            [
                'email' => 'aeerk@gmail.com',
                'phone' => '77000000',
                'adresse' => 'Medina',
                'fax' => '000000',
                'bp' => 'boite poste',
            ]);

        // $this->call(UserSeeder::class);
          // les roles
            Role::create(
            [
                'name' => 'Admin'
            ]);
            Role::create(
            [
                'name' => 'Codifier'
            ]);
            Role::create(
            [
                'name' => 'Logement'
            ]);
            Role::create(
            [
                'name' => 'Article'
            ]);
            // fin des role

            Permission::create(
            [
                'name' => 'index',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Admin'
            ]);


            Permission::create(
            [
                'name' => 'index',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Codifier'
            ]);


            Permission::create(
            [
                'name' => 'index',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Logement'
            ]);



            Permission::create(
            [
                'name' => 'index',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Article'
            ]);

         



            

    
            // Insertion Reseau Sociaux
                Social::create(
                [
                    'name' => "facebook",
                    'lien' => "www.facebook.com"
                ]);
                Social::create(
                [
                    'name' => "youtube",
                    'lien' => "www.youtube.com"
                ]);
                Social::create(
                [
                    'name' => "twitter",
                    'lien' => "www.twitter.com"
                ]);
                Social::create(
                [
                    'name' => "whatsapp",
                    'lien' => "www.whatsapp.com"
                ]);
    
                Social::create(
                [
                    'name' => "instagram",
                    'lien' => "www.instagram.com"
                ]);
            // Fin des reseau sociaux
    
            // Insertion de Categorie
    
            Category::create(
                [
                    'name' => "Politique",
                    'slug' => "Campagne"
                    
                ]);
                 Category::create(
                [
                    'name' => "Culturelle",
                    'slug' => "Danse"
                    
                ]);
                 Category::create(
                [
                    'name' => "Sport",
                    'slug' => "Football"
                    
                ]);
                 Category::create(
                [
                    'name' => "Religion",
                    'slug' => "Gamou"
                    
                ]);
    
            // Fin Insertion de Categorie
    
                  Tag::create(
                    [
                        'name' => "Politique",
                        'slug' => "Campagne"
                        
                    ]);
                    Tag::create(
                    [
                        'name' => "Culturelle",
                        'slug' => "Danse"
                        
                    ]);
                    Tag::create(
                    [
                        'name' => "Sport",
                        'slug' => "Football"
                        
                    ]);
                    Tag::create(
                    [
                        'name' => "Religion",
                        'slug' => "Gamou"
                        
                    ]);
        
                // Fin Insertion de Tag


                Admin::create([
                    'name' => 'Diallo Ousmane',
                    'email' => 'blog@gmail.com',
                    'phone' => '00000000',
                    'status' => 1,
                    'poste_id' => 1,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'image' => 'public/Admin/Uaal6DhRm3YX7ySbmGURFHrA8fl2VY42aWLdGZM5.jpeg'
                ]);
                // fin de la connexion des admin

                
                Role_admin::create(
                [
                    'admin_id' => 1,
                    'role_id' => 1
                ]);

                Role_admin::create(
                [
                    'admin_id' => 1,
                    'role_id' => 2
                ]);

                Role_admin::create(
                [
                    'admin_id' => 1,
                    'role_id' => 3
                ]);

                Role_admin::create(
                [
                    'admin_id' => 1,
                    'role_id' => 4
                ]);

                Option::create([
                    'register' => 1,
                    'register_nouveau' => 1,
                    'register_ancien' => 1,
                    'register_recasement' => 1,
                    'codification' => 1,
                    'codification_nouveau' => 1,
                    'codification_ancien' => 1,
                    'recasement' => 1
                ]);

                Solde::create([
                    'prix_nouveau' => 30000,
                    'prix_ancien' => 31000,
                    'numero_nouveau' => 770000000,
                    'numero_ancien' => 780000000,
                ]);

                User::create([
                   'email' => 'codifier@gmail.com',
                   'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
                ]);
    }
}
