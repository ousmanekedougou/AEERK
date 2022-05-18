<?php
namespace App\Helpers;
use Paydunya\Setup;
use Paydunya\Checkout\Store;

Setup::setMasterKey(env('AEERK_MASTER_KEY'));
Setup::setPublicKey(env('AEERK_PUBLIC_KEY'));
Setup::setPrivateKey(env('AEERK_PRIVATE_KEY'));
Setup::setToken(env('AEERK_TOKEN_KEY'));
Setup::setMode(env('AEERK_MODE_KEY'));


// Setup::setMasterKey("00J5ElPL-WRPr-o15z-3kcj-F1sNwX9AqXCR");
// Setup::setPublicKey("test_public_Le38qc2XyAdNVGvEO5RvdxbcElt");
// Setup::setPrivateKey("test_private_867eS9f5caorDp5a11wTga10ZOc");
// Setup::setToken("NgEnnqDStUiBm5W1JDGJ");
// // Optionnel. Utilisez cette option pour les paiements tests.
// Setup::setMode("test");  


//Configuration des informations de votre service/entreprise
Store::setName("Aeerk-Money"); // Seul le nom est requis
Store::setTagline("Codification");
Store::setPhoneNumber("770000000");
Store::setPostalAddress("Median Rue 39x30");



// Store::setWebsiteUrl("http://localhost:8000/");
// Store::setLogoUrl("http://localhost:8000/logo.png");
// Store::setCallbackUrl("http://localhost:8000/reponse");
// Store::setReturnUrl("http://localhost:8000/reponse");
// Store::setCancelUrl("http://localhost:8000/paymentAnnuler");


Store::setWebsiteUrl("https://www.aeerk-sn.com/");
Store::setLogoUrl("https://www.aeerk-sn.com/logo.png");
Store::setCallbackUrl("https://www.aeerk-sn.com/reponse");
Store::setReturnUrl("https://www.aeerk-sn.com/reponse");
Store::setCancelUrl("https://www.aeerk-sn.com/paymentAnnuler");
