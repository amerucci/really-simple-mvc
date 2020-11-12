<?php
/*SANS OBJET*/
// function thePost($postID){
//     return "je suis le poste".$postID;
// }

// function allPosts(){
//    return "voici tous les postes"; 
// }

/*AVEC DE L'OBJET*/
// class Post{
//     public function thePost($postID){
//     return "je suis le poste".$postID;
//     }

//     public function allPosts(){
//     return "voici tous les postes"; 
//     }

// }

require_once('connection.php');

/*AVEC DE L'OBJET ET UNE BDD*/
class Post extends Databases{

    public function thePost($postID){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE id='.$postID.'');
        $post->execute();
        $result = $post->fetch(PDO::FETCH_ASSOC);
        return $result;
     }

    public function allPosts(){
        $post = $this->connect()->prepare('SELECT * FROM post');
        $post->execute();
        $result = $post->fetchAll();
        return $result;
    }

}