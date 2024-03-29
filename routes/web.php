<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    Route::group(['namespace' => 'User'],function(){
        Route::resource('/','HomeController');
        Route::get('/paymentAnnuler','HomeController@create')->name('codification.annuller');
        Route::resource('/contact','ContactController');
        Route::resource('/nouveau','NouveauController');
        Route::resource('/ancien','AncienController');
        Route::post('/temoignage','TemoignageController@post')->name('temoignage.post');
        Route::post('/ancien/update','AncienController@update_certificat')->name('update_certificat');
        Route::resource('/recasement','RecasementController');
        Route::resource('/about','AboutController');
        Route::resource('/article','ArticleController');
        Route::resource('/comment','CommentController');
        Route::get('/category/{id}','ArticleController@category')->name('article.category');
        Route::get('/etiquette/{id}','ArticleController@etiquette')->name('article.etiquette');
        Route::resource('/codification','EtudiantCodificationController');
        Route::get('/reponse','EtudiantCodificationController@reponse')->name('codification.reponse');
        Route::get('/payment','EtudiantCodificationController@payment')->name('codification.payment');
        Route::put('/codification/{id}/codifier_ancien','EtudiantCodificationController@codifier_ancien')->name('codifier_ancien');
        Route::get('/createPdf/{id}/{codification_token}','EtudiantCodificationController@createPdf')->name('createPdf');
      
        Route::resource('/systeme','SystemeController');
        Route::get('/bibliotheque','BibliothequeController@index')->name('bibliotheque.index');
        Route::get('/bibliotheque/faculty/{slug}','BibliothequeController@show')->name('bibliotheque.show');
        Route::post('/bibliotheque/search','BibliothequeController@search')->name('bibliotheque.search');

        // Les routes des recrutements
        Route::resource('/emplois','JobController');
        Route::get('/emplois/add/{slug}','JobController@add')->name('emplois.add');
        
    });

    

    Auth::routes();

    Route::prefix('/admin')->name('admin.')->group(function() 
    {
        Route::get('/home', 'Admin\HomeController@index')->name('home');
        // Tout ce qui est blog
        Route::resource('/post', 'Admin\PostController');
        Route::resource('/category', 'Admin\CategoryController');
        Route::resource('/tag', 'Admin\TagController');
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
        // Fin de tout ce qui est paramettres

        // les options des services
        Route::resource('/contact', 'Admin\ContactController');
        Route::post('/contact/send', 'Admin\ContactController@post')->name('contact.post');
        Route::resource('/document', 'Admin\DocumentController');

        Route::resource('/filliere','Admin\FacultyController');
        Route::get('/filliere/licence1/{id}', 'Admin\FacultyController@licence1')->name('filliere.licence1');
        Route::get('/filliere/licence2/{id}', 'Admin\FacultyController@licence2')->name('filliere.licence2');
        Route::get('/filliere/licence3/{id}', 'Admin\FacultyController@licence3')->name('filliere.licence3');
        Route::get('/filliere/master1/{id}', 'Admin\FacultyController@master1')->name('filliere.master1');
        Route::get('/filliere/master2/{id}', 'Admin\FacultyController@master2')->name('filliere.master2');
        // fin des options des document

        // La partie des logements
        Route::resource('/logement', 'Admin\LogementController');
        Route::resource('/commune', 'Admin\CommuneController');
        Route::resource('/profile', 'Admin\ProfilAdminController');
        Route::put('/profile/{id}/update_password', 'Admin\ProfilAdminController@update_password')->name('update_password');
        Route::put('/profile/{id}/update_image', 'Admin\ProfilAdminController@update_image')->name('update_image');
        Route::resource('/immeuble', 'Admin\ImmeubleController');
        Route::resource('/temoignage', 'Admin\TemoignageController');

        Route::resource('/chambre', 'Admin\ChambreController');
        Route::delete('/chambre/{id}/chambre_immeuble_43','Admin\ChambreController@chambre_immeuble_43')->name('chambre_immeuble_43');
        Route::delete('/chambre/{id}/chambre_immeuble_zoneA','Admin\ChambreController@chambre_immeuble_zoneA')->name('chambre_immeuble_zoneA');

        Route::resource('/departement', 'Admin\DepartementController');
        Route::resource('/localite', 'Admin\LocaliteController');
        Route::resource('/inscription', 'Admin\InscriptionController');
        Route::resource('/codification', 'Admin\CodificationController');
        Route::get('/downloadPDF', 'Admin\CodificationController@downloadPDF')->name('downloadPDF');

        Route::put('/ancien/{id}/codifier_ancien', 'Admin\AncienController@codifier_ancien')->name('codifier_ancien');
        Route::put('/nouveau/{id}/codifier_nouveau', 'Admin\NouveauController@codifier_nouveau')->name('codifier_nouveau');
        
        Route::resource('/recasement', 'Admin\RecasementController');
        Route::resource('/comission', 'Admin\ComissionController');
        Route::resource('/posteCommission', 'Admin\PosteCommissionController');
        Route::resource('/admin', 'Admin\AdminController');
        Route::get('/employer', 'Admin\AdminController@employer_index')->name('employer.index');
        Route::resource('/ancien', 'Admin\AncienController');

        Route::get('/ancien/{id}/update_ancien', 'Admin\AncienController@update_ancien')->name('update_ancien');
        Route::put('/ancien/{id}/valider', 'Admin\AncienController@valider_ancien')->name('valider_ancien');
        Route::post('/ancien/sendSms', 'Admin\AncienController@sendSms')->name('ancien.sendSms');
        Route::put('ancien/update_immeuble/{id}', 'Admin\AncienController@update_immeuble')->name('ancien.update_immeuble');

        Route::resource('/nouveau', 'Admin\NouveauController');
        Route::get('/nouveau/{id}/update_nouveau', 'Admin\NouveauController@update_nouveau')->name('update_nouveau');
        Route::put('/nouveau/{id}/valider', 'Admin\NouveauController@valider_nouveau')->name('valider_nouveau');
        Route::get('/migration', 'Admin\NouveauController@migret_nouveau')->name('migret_nouveau');
        Route::get('nouveau/sendSms', 'Admin\NouveauController@sendSms')->name('nouveau.sendSms');
        Route::put('nouveau/update_immeuble/{id}', 'Admin\NouveauController@update_immeuble')->name('nouveau.update_immeuble');
        // fin des option de uesr

        // la partie des recrutement par les entreprise
        Route::resource('/domaine', 'Admin\DomaineController');
        Route::post('/domaine/post', 'Admin\DomaineController@post')->name('domaine.post');
        Route::put('/domaine/update_post/{id}', 'Admin\DomaineController@update_post')->name('domaine.update_post');
        Route::delete('/domaine/delete/{id}', 'Admin\DomaineController@delete')->name('domaine.delete');
        Route::delete('/domaine/delete_emploi/{id}', 'Admin\DomaineController@delete_emploi')->name('domaine.delete_emploi');
        Route::get('/domaine/emploi/{id}', 'Admin\DomaineController@emploi')->name('domaine.emploi');
        
        Route::resource('/emplois', 'Admin\EmploiController');
        Route::get('/emplois/emploi/{id}', 'Admin\EmploiController@emploi')->name('emplois.emploi');
        Route::get('/emplois/stage/{id}', 'Admin\EmploiController@stage')->name('emplois.stage');

        // login admin
            Route::get('/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
            Route::post('/login','Admin\Auth\LoginController@login')->name('admin.login');
            Route::post('/logout','Admin\Auth\LoginController@logout')->name('admin.logout');
        // fin des login admin



        // Forgot password
            Route::get('/password/reset','Admin\ForgotPassword\ForgotController@reset')->name('password.reset');
            Route::post('/password/verify','Admin\ForgotPassword\ForgotController@verify')->name('password.verify');
            Route::get('/confirm/{id}/{email}','Admin\ForgotPassword\ForgotController@confirm')->name('password.confirm');
            Route::put('/update/{id}/{email}/{token}','Admin\ForgotPassword\ForgotController@update')->name('password.update');
        // And forgot password
    });

 


