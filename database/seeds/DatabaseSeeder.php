<?php

use App\Model\Admin\Tag;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use App\Model\Admin\Social;
use App\Model\Admin\Category;
use App\Model\Admin\Chambre;
use App\Model\Admin\Commission;
use App\Model\Admin\Commune;
use App\Model\Admin\Departement;
use App\Model\Admin\Immeuble;
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
                'email' => 'aeerk.sn@gmail.com',
                'phone' => '770433235',
                'adresse' => 'Rue 39x30 Medina-Dakar',
                'bp' => '10500',
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

              
            Admin::create([
                'name' => 'Diallo Ousmane',
                'email' => 'yabaye07@gmail.com',
                'phone' => '7700000000',
                'status' => 1,
                'is_admin' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'image' => 'public/Admin/Uaal6DhRm3YX7ySbmGURFHrA8fl2VY42aWLdGZM5.jpeg'
            ]);
            // fin de la connexion des admin

            

            $departement = [
                'Kedougou','Saraye','Salemate'
            ];

            foreach ($departement as $dep) {
                Departement::create([
                    'name' => $dep
                ]);
            }

            $kedougou = [
                'Kedougou' => 1,
                'Bandafassi' => 1,
                'Dimboli' => 1,
                'Dindefelo' => 1,
                'Fongolimbi' => 1,
                'Ninefecha' => 1,
                'Tomboronkoto' => 1,
            ];
            foreach ($kedougou as $key_ked => $value_ked) {
                Commune::create([
                    'name' => $key_ked,
                    'departement_id' => $value_ked
                ]);
            }

            $saray = [
                'Bembou' => 2,
                'Khossanto' => 2,
                'Medina Bafe' => 2,
                'Missirah Sirimana' => 2,
                'Sabodala' => 2,
                'Saraya' => 2,
            ];
            foreach ($saray as $key_sar => $value_sar) {
                Commune::create([
                    'name' => $key_sar,
                    'departement_id' => $value_sar
                ]);
            }
            $salemata = [
                'Dakately' => 3,
                'Dar Salam' => 3,
                'Ethiolo' => 3,
                'Kevoye' => 3,
                'Oubadji' => 3,
                'Salemata' => 3,
            ];
            foreach ($salemata as $key_sale => $value_sale) {
                Commune::create([
                    'name' => $key_sale,
                    'departement_id' => $value_sale
                ]);
            }

        

            Immeuble::create([
                'name' => 'Immeuble 43',
                'status' => 1
            ]);
            Immeuble::create([
                'name' => 'Immeuble 39',
                'status' => 2
            ]);
            Immeuble::create([
                'name' => 'Immeuble Zone A',
                'status' => 2
            ]);
// _________________________________Debut de l'ajout des immeuble pour 43______________________________________
            // Immeuble 43 Premier
            Chambre::create([
                'nom' => '1D1',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '1D2',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '1D3',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
             Chambre::create([
                'nom' => '1G1',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '1G2',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            // Fin Immeuble 43 premier

             // Immeuble 43 deuxieme
            Chambre::create([
                'nom' => '2D1',
                'nombre' => 6,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '2D2',
                'nombre' => 6,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '2D3',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '2G1',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '2G2',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            // Fin Immeuble 43 deuxieme

             // Immeuble 43 troisieme
            Chambre::create([
                'nom' => '3D1',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '3D2',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '3D3',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '3G1',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '3G2',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            // Fin Immeuble 43 troisieme

             // Immeuble 43 quatrieme
            Chambre::create([
                'nom' => '4D1',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '4D2',
                'nombre' => 6,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '4G1',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            Chambre::create([
                'nom' => '4G2',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 1
            ]);
            // Fin Immeuble 43 quatrieme
// ___________________________________Fin de l'ajout des chambre pour Immeuble 43__________________________


// _____________________________________Debut de l'ajout pour Immeuble 39_____________________________________
             // Immeuble 39 Re des socces
            Chambre::create([
                'nom' => 'RD1',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => 'RD2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => 'RD3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // Immeuble 39 fin Re de socce

            // Immeuble 39 Premier
             Chambre::create([
                'nom' => '1D1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1D2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1D3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1D4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => '1G1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1G2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1G3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '1G4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // fin immeuble 39 premier
            
            // Immeuble 39 deuxieme
             Chambre::create([
                'nom' => '2D1',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2D2',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2D3',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2D4',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => '3G1',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2G2',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2G3',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '2G4',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // Fin immeuble 39 deuxieme

             // Immeuble 39 troisieme
             Chambre::create([
                'nom' => '3D1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3D2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3D3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3D4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => '3G1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3G2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3G3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '3G4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // fin immeuble 39 troisieme

            // Immeuble 39 quatrieme
             Chambre::create([
                'nom' => '4D1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4D2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4D3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4D4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
             Chambre::create([
                'nom' => '4G1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4G2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4G3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '4G4',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // fin immeuble 39 quatrieme
            
            // Immeuble 39 cinquieme
             Chambre::create([
                'nom' => '5D1',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '5D2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            Chambre::create([
                'nom' => '5D3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 2
            ]);
            // fin immeuble 39 cinquieme

// ____________________________________________Fin de l'ajout pour immeuble 39________________________________

// ____________________________________________Debut de l'immeuble Zone A______________________________________

             // Immeuble Zone A re de cosse
             Chambre::create([
                'nom' => 'RA1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => 'RA2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => 'RA3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => 'RB1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => 'RB2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => 'RB3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A re de cosse


            // Immeuble Zone A premier
            Chambre::create([
                'nom' => '1A1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '1A2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '1A3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => '1B1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '1B2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '1B3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A premier

               // Immeuble Zone A deuxieme
             Chambre::create([
                'nom' => '2A1',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '2A2',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '2A3',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => '2B1',
                'nombre' => 8,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '2B2',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '2B3',
                'nombre' => 4,
                'genre' => 1,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A deuxieme


            // Immeuble Zone A troisieme
            Chambre::create([
                'nom' => '3A1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '3A2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '3A3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => '3B1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '3B2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '3B3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A troisieme

               // Immeuble Zone A quatrieme
            Chambre::create([
                'nom' => '4A1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '4A2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '4A3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => '4B1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '4B2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '4B3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A quatrieme

               // Immeuble Zone A cinquieme
            Chambre::create([
                'nom' => '5A1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '5A2',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            Chambre::create([
                'nom' => '5A3',
                'nombre' => 4,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
             Chambre::create([
                'nom' => '5B1',
                'nombre' => 8,
                'genre' => 2,
                'status' => 1,
                'is_pleine' => 0,
                'position' => 0,
                'immeuble_id' => 3
            ]);
            // fin immeuble Zone A cinquieme

// ____________________________________________Fin de li'immeuble Zone A______________________________________
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
                   'email' => 'aeerk.sn@gmail.com',
                   'sendmail' => 'aeerk.sn@gmail.com',
                   'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                   'lien' => 2,
                   'sendPhone' => 221781956168,
                   'text_dechifre' => 'password'
                ]);


    }
}
