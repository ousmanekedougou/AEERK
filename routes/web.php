<?php


// Route::get('/', function () {
//     return view('user/welcome');
// });

Route::group(['namespace' => 'User'],function(){
    Route::resource('/','HomeController');

    Route::resource('/contact','ContactController');

    Route::resource('/nouveau','NouveauController');
    Route::resource('/ancien','AncienController');
    Route::resource('/recasement', 'RecasementController');
    Route::resource('/formation','FormationController');

    Route::resource('/service','ServiceController');

    Route::resource('/about','AboutController');

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
        // Fin de tout ce qui est blog

        // Tout ce qui est Parametre
        Route::resource('/info', 'Admin\InfoController');
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
        Route::resource('/immeuble', 'Admin\ImmeubleController');
        Route::resource('/chambre', 'Admin\ChambreController');
        Route::resource('/departement', 'Admin\DepartementController');
        Route::resource('/localite', 'Admin\LocaliteController');
        Route::resource('/admission', 'Admin\AdmissionController');
        Route::resource('/codification', 'Admin\CodificationController');
        Route::put('/codification/{id}/codifier_ancien', 'Admin\CodificationController@codifier_ancien')->name('codifier_ancien');
        Route::resource('/recasement', 'Admin\RecasementController');
        Route::resource('/comission', 'Admin\ComissionController');
        Route::resource('/posteCommission', 'Admin\PosteCommissionController');
        Route::resource('/admin', 'Admin\AdminController');
        Route::resource('/ancien', 'Admin\AncienController');
        Route::get('/ancien/{id}/update_ancien', 'Admin\NouveauController@update_ancien')->name('update_ancien');
        Route::resource('/nouveau', 'Admin\NouveauController');
        Route::get('/nouveau/{id}/update_nouveau', 'Admin\NouveauController@update_nouveau')->name('update_nouveau');
        // fin des option de uesr

        // login admin
        Route::get('/admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/admin-login','Admin\Auth\LoginController@login')->name('admin.login');
        Route::post('/admin-logout','Admin\Auth\LoginController@logout')->name('admin.logout');
        // fin des login admin
    });


Auth::routes();
