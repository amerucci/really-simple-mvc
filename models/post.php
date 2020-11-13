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

    public $maxId;

    public function thePost($postID){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE id='.$postID.'');
        $post->execute();
        $result = $post->fetch(PDO::FETCH_ASSOC);
        return $result;
     }

    public function allPosts(){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE  id!='.$this->maxId().' ORDER BY date DESC' );
        $post->execute();
        $result = $post->fetchAll();
        return $result;
    }

    public function maxId(){
        $post = $this->connect()->prepare('SELECT max(ID) FROM post' );
        $post->execute();
        $lastId = $post->fetch();
        return $lastId['max(ID)'];
        //var_dump($lastId['max(ID)']);
    }

    public function lastPost(){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE id='.$this->maxId().'');
        $post->execute();
        $lastPosts = $post->fetch(PDO::FETCH_ASSOC);
        return $lastPosts;
        //var_dump($lastPosts);
    }

}