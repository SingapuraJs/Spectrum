<?php 
namespace Controller;

use Controller\BaseController;
use Flight;
use GrahamCampbell\ResultType\Success;
use Model\PostModel;

class PostController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new PostModel();
    }

    public function doPost()
    {
        $uploadPath = new \Upload\Storage\FileSystem('../WebSiteOliver/archives/posts');
        $post = new \Upload\File('img', $uploadPath);
        $new_postName = uniqid();
        $new_postName = md5($new_postName);
        $post->setName($new_postName);

        $post->addValidations(array(
            // Ensure file is of type "image/png"
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
        
            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))
        
            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('16M')
        ));

        $postImgData = array(
            'name'       => $post->getNameWithExtension(),
            'extension'  => $post->getExtension(),
            'mime'       => $post->getMimetype(),
            'size'       => $post->getSize(),
        );


        $postData = [
            'img' => $post->getNameWithExtension(),
            'desc' => $_POST['desc'],
            'id' => $_SESSION['user']['id']
        ];

        $post->upload();
        $result = $this->model->make($postData);

        if($result['success']){
            $_SESSION['feedback'] = 'success';
            Flight::redirect('/profile');
        } else {
            $_SESSION['feedback'] = 'error';
            Flight::redirect('/profile');
        }
        
    }
}

?>