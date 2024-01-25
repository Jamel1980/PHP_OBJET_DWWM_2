<?php
    session_start();
    if(!$_SESSION){     // la variable $session est encore vide======= $_SESSION=[];
        $_SESSION['username']='user';
        $_SESSION['roles']=json_encode(['ROLE_USER']);
        $_SESSION['bg_navbar']='bg_red';
    }
    require_once("Service/extra.php");
    spl_autoload_register('charger'); //spl_autoload_register charge automatiquement la fonction indiqué en parametre. (ici le nom de la fonction est chargé)
    $path='accueil';  //initialisation de la variable $path
    extract($_GET);  // génération de variables via les indices de $_GET exemple $path,$action,$id 
    $nameController=ucfirst($path)."Controller"; // création de nom du controller via $path. par ex si $path="article" alors $nameController="ArticleController"
    $fileController="Controller/$nameController.php"; //génération du chemin ou se trouve la fichier correspondant au controller désigné par $nameController. par exemple "Controller/ArticleController.php
    if(file_exists($fileController)){  // On teste l'existance du fichier représenté par $fileController
        $page=new $nameController();  // cas ou le fichier existe 
    }else{
        echo "<h1>le fichier $nameController n'existe pas!!!!</h1>"; // cas ou le fichier n'existe pas 
        die;
    }
    
    
    // $am=new ArticleManager();
    // $id=2;
    // $article_assoc=$am->find($id,'array');
    // $article_obj=$am->find($id,'obj');
    // // si je veux afficher la designation de $article_assoc en tableau
    // echo $article_assoc['designation'] . '<br>';
    // // si je veux afficher la designation de $article_obj
    // echo $article_obj->getDesignation(); // c'est faux de l'écrire : article_ob['designation]
    // die;
    // printr($article_assoc);
    // printr($article_obj);

// $article=new Article();
// $articles=$article->findAll();
// printr($articles);
// $manager=new Manager();
// $article=$manager->findByIdTable("article",2);
// printr($article);
// $art=new Article();
// $art=$art->findByIdTable('article',4);
// printr($art);


// $myFct=new myFct();
// $article=$myFct->findByIdTable('article',2);
// $articles=$myFct->listTable('article');
// $myFct->printr($article);
// $art=[
//     'id'=>2,
//     'numArticle'=>'BV0002',
//     'designation'=>'Vin Listel gris 75 cl',
//     'prixUnitaire'=>'15.20',
// ]  ;

// $article=new Article($art);
// $client=new Client();

// $myFct->printr($article);
// $myFct->printr($client);


