<?php

use App\Model\Admin\Tag;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use App\Model\Admin\Social;
use App\Model\Admin\Category;
use App\Model\Admin\Commission;
use App\Model\Admin\Info;
use App\Model\Admin\Permission;
use App\Model\Admin\Option;
use App\Model\Admin\Poste;
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

            $com = [
                'Social',
                'Pedagogique',
                'Sportive',
                'Culturelle',
                'Organisation'
            ];

            foreach ($com as $c) { 
                Commission::create([
                    'name' => $c,
                    'status' => 1
                ]);
            }

            $post = [
                'President',
                'Secretaire',
                'Tresorie',
                'Commissaire au compte',
            ];

            foreach ($post as $p) {
                Poste::create([
                    'name' => $p,
                    'status' => 1
                ])->commissions()->sync(1,2,3,4);
            }
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

                

               
                $admin = Admin::create([
                    'name' => 'Diallo Ousmane',
                    'email' => 'yabaye07@gmail.com',
                    'phone' => '00000000',
                    'status' => 1,
                    'poste_id' => 1,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'image' => 'public/Admin/Uaal6DhRm3YX7ySbmGURFHrA8fl2VY42aWLdGZM5.jpeg'
                ]);
                // fin de la connexion des admin

                // les roles
                $role = [
                    'Admin',
                    'Codifier',
                    'Logement',
                    'Article',
                ];
                foreach ($role as $r) {
                    Role::create(
                    [
                        'name' => $r
                    ])->admins()->sync($admin->id);
                    // fin des role
                }

                //Creer les permissions
                    $permission = [
                    'index' => 'Admin',
                    'create' => 'Admin',
                    'update' => 'Admin',
                    'delete' => 'Admin',

                    'index' => 'Codifier',
                    'create' => 'Codifier',
                    'update' => 'Codifier',
                    'delete' => 'Codifier',

                    'index' => 'Logement',
                    'create' => 'Logement',
                    'update' => 'Logement',
                    'delete' => 'Logement',

                    'index' => 'Article',
                    'create' => 'Article',
                    'update' => 'Article',
                    'delete' => 'Article',
                ];

                $roles = Role::all();
                foreach ($roles as $role) {
                    foreach ($permission as $k => $v) { 
                        if ($role->name == $v) {
                            Permission::create([
                            'nom' => $k,
                            'for' => $v,
                            ])->roles->sync($role->id);
                        }
                    }
                }

         

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
