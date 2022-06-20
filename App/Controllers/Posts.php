<?php

namespace App\Controllers;


use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{

    public function indexAction()
    {
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html',[
            'posts' => $posts
        ]);
   
    }

    public function addPostAction()
    {
        View::renderTemplate('Posts/add.html');
    }

    public function insertPostAction()
    {
        $tilte = $_POST['title'];
        $content = $_POST['content'];
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;
        $path_uploads = "/var/www/thopham.test/public/uploads/post/".$unique_image;


        $data = array(
            'title' => $tilte,
            'image' =>  $unique_image,
            'content' => $content,
        );

        $table = 'posts';
        $isInserted = Post::insertPost($table,$data);
        if($isInserted) 
        {
            move_uploaded_file($tmp_image,$path_uploads);
            return $this->redirect('http://thopham.test/?posts/index');
        }
        
    }

    public function getId($url)
    {
        $id = preg_replace('/[^0-9]/','', $url);  
        return $id;
    }

    public function editPostAction()
    {  
        $url =$_SERVER['QUERY_STRING']; 
        $id = $this->getId($url);
        $table = "posts";
        $cond = "posts.id='$id'";
        $data = Post::getPostById($table,$cond);
        View::renderTemplate('Posts/edit.html', [
            'posts' => $data
        ]);
    }

    public function updatePostAction()
    {
        $url =$_SERVER['QUERY_STRING']; 
        $id = $this->getId($url);
        $table = "posts";
        $cond = "posts.id='$id'";
        $tilte = $_POST['title'];
        $content = $_POST['content'];

        $data = array(
            'title' => $tilte,
            'content' => $content
        );

        $isUpdated = Post::updatePost($table,$cond,$data);
        if($isUpdated) {
            return $this->redirect('http://thopham.test/?posts/index');
        }
    }


    public function deletePostAction()
    {
        $url =$_SERVER['QUERY_STRING']; 
        $id = $this->getId($url);
        $table = "posts";
        $cond = "posts.id='$id'";
        $isDeleted = Post::deletePost($table,$cond);
        if($isDeleted){
            return $this->redirect('http://thopham.test/?posts/index');
        }
    }

    public function redirect($url)
    {
        ?>
            <script>
                $url = '<?= $url ?>'
                window.location.href = $url;
            </script>
        <?php
    }


}
