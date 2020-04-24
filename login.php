<?php

 require_once ("autoload.php");
$db=new Db();
$base=$db->getBase();

 function verif()
{

if(isset($_POST['user']) AND isset($_POST['pwd']))
{
    $user=htmlspecialchars($_POST['user']);
    $pwd=htmlspecialchars($_POST['pwd']);

        $requette=$base->prepare('SELECT * FROM compte WHERE login =:user AND password =:pwd');
        $requette->execute(array('user'=>$user, 'pwd'=>$pwd));
        $rep=$requette->fetch();
        if($rep)
        {
            return 'ok';
        }
        else
        {
            $erreur="mot de passe ou nom d'utilisateur incorect";
            return $erreur;
        }
}    
}

?>