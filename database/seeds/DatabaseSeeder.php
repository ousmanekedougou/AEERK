<?php

use App\Model\Admin\Tag;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use App\Model\Admin\Social;
use App\Model\Admin\Category;
use App\Model\Admin\Permission;
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
        // $this->call(UserSeeder::class);
          // les roles
          Role::create(
            [
                'name' => 'Modifier'
            ]);
            Role::create(
            [
                'name' => 'Publier'
            ]);
            Role::create(
            [
                'name' => 'Ecrire'
            ]);
            Role::create(
            [
                'name' => 'Creer'
            ]);
            // fin des role

            Role::create(
            [
                'email' => 'aeerk@gmail.com',
                'phone' => '77000000',
                'adresse' => 'Medina',
                'fax' => '000000',
                'bp' => 'boite poste',
            ]);
                
    
    
            Permission::create(
            [
                'name' => 'Creer-Article',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'Modifier-Article',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'Supprimer-Article',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'Publier-Article',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'Creer-Medecin',
                'for' => 'Medecin'
            ]);
            Permission::create(
            [
                'name' => 'Modifier-Medecin',
                'for' => 'Medecin'
            ]);
            Permission::create(
            [
                'name' => 'Supprimer-Medecin',
                'for' => 'Medecin'
            ]);
            Permission::create(
            [
                'name' => 'Publier-Medecin',
                'for' => 'Medecin'
            ]);
            Permission::create(
            [
                'name' => 'Tag-Crud',
                'for' => 'Autre'
            ]);
            Permission::create(
            [
                'name' => 'Categorie-Crud',
                'for' => 'Autre'
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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // 11111111
            'image' => 'public/Admin/Uaal6DhRm3YX7ySbmGURFHrA8fl2VY42aWLdGZM5.jpeg'
        ]);
        // fin de la connexion des admin
    }
}
