<?php
use App\Mail\ContactMessageCreated;


Route::group(['namespace' => 'User'],function(){
    Route::resource('/','HomeController');
    Route::resource('/contact','ContactController');
    Route::resource('/nouveau','NouveauController');
    Route::resource('/ancien','AncienController');
    Route::resource('/recasement', 'RecasementController');
    Route::resource('/formation','FormationController');
    Route::resource('/service','ServiceController');
    Route::resource('/about','AboutController');
    Route::resource('/article','ArticleController');
    Route::resource('/comment','CommentController');
    Route::resource('/codification','EtudiantCodificationController');
    Route::put('/codification/{id}/codifier_ancien','EtudiantCodificationController@codifier_ancien')->name('codifier_ancien');
    Route::get('/category/{id}','ArticleController@category')->name('article.category');
    Route::get('/etiquette/{id}','ArticleController@etiquette')->name('article.etiquette');
    Route::resource('/realisation','RealisationController');
});


    Route::prefix('/admin')->name('admin.')->group(function() 
    {
        Route::get('/home', 'Admin\HomeController@index')->name('home');
        // Tout ce qui est blog
        Route::resource('/post', 'Admin\PostController');
        Route::resource('/category', 'Admin\CategoryController');
        Route::resource('/tag', 'Admin\TagController');
        Route::resource('/permission','Admin\PermissionController');
        Route::resource('/role','Admin\RoleController');
        Route::resource('/option','Admin\OptionController');
        // Fin de tout ce qui est blog

      

        // Tout ce qui est Parametre
        Route::resource('/info', 'Admin\InfoController');
        Route::put('/info/{id}/solde','Admin\InfoController@solde')->name('solde');
        Route::put('/info/{id}/register','Admin\InfoController@register')->name('register');
        Route::put('/info/{id}/register_etudiant','Admin\InfoController@register_etudiant')->name('register_etudiant');
        Route::put('/info/{id}/register_recasement','Admin\InfoController@register_recasement')->name('register_recasement');
        Route::put('/info/{id}/codification','Admin\InfoController@codification')->name('codification');
        Route::put('/info/{id}/codification_etudiant','Admin\InfoController@codification_etudiant')->name('codification_etudiant');
        Route::put('/info/{id}/recasement_etudiant','Admin\InfoController@recasement_etudiant')->name('recasement_etudiant');

        Route::put('/info/{id}/autorisation','Admin\InfoController@autorisation')->name('autorisation');

        
        Route::post('/info/ajouter','Admin\InfoController@add_prix')->name('add_prix');
        Route::resource('/team', 'Admin\TeamController');
        Route::resource('/partener', 'Admin\PartenerController');
        Route::resource('/gallery', 'Admin\GalleryController');
        Route::resource('/social', 'Admin\SocialController');
        Route::resource('/slider', 'Admin\SlideController');
        Route::resource('/personnel', 'Admin\PersonnelController');
        Route::resource('/disigne', 'Admin\DisigneController');
        // Fin de tout ce qui est paramettres

        // les options des services
        Route::resource('/service', 'Admin\ServiceController');
        Route::resource('/activite', 'Admin\ActiviteController');
        Route::resource('/abaout', 'Admin\AboutController');
        Route::resource('/realisation', 'Admin\RealisationController');
        Route::resource('/historique', 'Admin\HistoriqueController');
        Route::resource('/contact', 'Admin\ContactController');
        Route::resource('/document', 'Admin\DocumentController');
        // fin des options des document

        // La partie des logements
        Route::resource('/logement', 'Admin\LogementController');
        Route::resource('/commune', 'Admin\CommuneController');
        Route::resource('/profile', 'Admin\ProfilAdminController');
        Route::resource('/immeuble', 'Admin\ImmeubleController');
        Route::resource('/chambre', 'Admin\ChambreController');
        Route::resource('/departement', 'Admin\DepartementController');
        Route::resource('/localite', 'Admin\LocaliteController');
        Route::resource('/inscription', 'Admin\InscriptionController');
        Route::resource('/codification', 'Admin\CodificationController');

        Route::put('/ancien/{id}/codifier_ancien', 'Admin\AncienController@codifier_ancien')->name('codifier_ancien');
        Route::put('/nouveau/{id}/codifier_nouveau', 'Admin\NouveauController@codifier_nouveau')->name('codifier_nouveau');
        
        Route::resource('/recasement', 'Admin\RecasementController');
        Route::resource('/comission', 'Admin\ComissionController');
        Route::resource('/posteCommission', 'Admin\PosteCommissionController');
        Route::resource('/admin', 'Admin\AdminController');
        Route::resource('/ancien', 'Admin\AncienController');

        Route::get('/ancien/{id}/update_ancien', 'Admin\AncienController@update_ancien')->name('update_ancien');
        Route::put('/ancien/{id}/valider', 'Admin\AncienController@valider_ancien')->name('valider_ancien');

        Route::resource('/nouveau', 'Admin\NouveauController');
        Route::get('/nouveau/{id}/update_nouveau', 'Admin\NouveauController@update_nouveau')->name('update_nouveau');
        Route::put('/nouveau/{id}/valider', 'Admin\NouveauController@valider_nouveau')->name('valider_nouveau');
        // fin des option de uesr

        // login admin
        Route::get('/admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/admin-login','Admin\Auth\LoginController@login')->name('admin.login');
        Route::post('/admin-logout','Admin\Auth\LoginController@logout')->name('admin.logout');
        // fin des login admin
    });

 

Auth::routes();
