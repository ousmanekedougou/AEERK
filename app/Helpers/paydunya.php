<?php

use Paydunya\Setup;
use Paydunya\Checkout\Store;

Setup::setMasterKey("AqF7wDeD-Tony-Tlrq-kyEU-RCjmhsDfiF0Y");
Setup::setPublicKey("test_public_ew18NxL74bQYgwQOjYOYBGwz1f4");
Setup::setPrivateKey("test_private_DWrBMRN6xx2WxLEa2oNpYh30B92");
Setup::setToken("bNVfoueHjgHFdmgOYNb4");
Setup::setMode("test"); // Optionnel. Utilisez cette option pour les paiements tests.

//Configuration des informations de votre service/entreprise
Store::setName("AEERK"); // Seul le nom est requis
Store::setTagline("Codification");
Store::setPhoneNumber("781956168");
Store::setPostalAddress("Median");
Store::setWebsiteUrl("http://localhost:8000/");
Store::setLogoUrl("http://localhost:8000//logo.png");
Store::setCallbackUrl("http://localhost:8000/reponse");