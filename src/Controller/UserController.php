<?php 

namespace Controller;

use Controller\BaseController;
use Flight;
use GrahamCampbell\ResultType\Success;
use LDAP\Result;
use Model\UserModel;
class UserController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function create()
    {
        echo $this->blade->render('user/create');
    }

    public function store()
    {
        if(empty($_FILES['profile_pic']['name'])){
            $_SESSION['feedback'] = "nofile";
            Flight::redirect('./register');
            exit;
        }
        $uploadPath = new \Upload\Storage\FileSystem('../Spectrum/archives/users');
        $pic = new \Upload\File('profile_pic', $uploadPath);

        $new_picname = uniqid();
        $new_picname = md5($new_picname);
        $pic->setName($new_picname);

        $pic->addValidations(array(
            // Ensure file is of type "image/png"
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
        
            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))
        
            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('16M')
        ));

        $picData = array(
            'name'       => $pic->getNameWithExtension(),
            'extension'  => $pic->getExtension(),
            'mime'       => $pic->getMimetype(),
            'size'       => $pic->getSize(),
        );




        $userData = [
            'usr_usuario' => $_POST['username'],
            'usr_email' => $_POST['email'],
            'usr_senha' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'usr_foto' => $pic->getNameWithExtension()
        ];


        $username = $_POST['username'];
        $userEmail = $_POST['email'];
    
        if($this->model->checkCredentials($username, $userEmail)){
            $_SESSION['feedback'] = 'exists';
            Flight::redirect('/login');
        }else {

            try {
                $pic->upload();
            } catch (\Exception $e) {
                $_SESSION['feedback'] = 'unexpected';
                Flight::redirect('/register');
            }

            $result = $this->model->add($userData);
            if ($result['success']){
                $_SESSION['feedback'] = 'created';
                Flight::redirect('/login');
            } else {
                $_SESSION['feedback'] = 'unexpected';
                Flight::redirect('/register');
            }
        };
    }
    public function profile($username) 
    {
        $userAllData = $this->model->getExistent($username);
        
        if ($userAllData != false) {
            $controller = new PostController;
            $userAllPosts = $controller->getPosts($userAllData['id_usuario']);
            $userData = [
            'id' => $userAllData['id_usuario'],
            'foto' => $userAllData['usr_foto'],
            'nome' => $userAllData['usr_usuario'],
            'bio' => $userAllData['usr_bio'],
            'posts' => $userAllPosts
            ];
            echo $this->blade->render('user/profile', ['userData' => $userData]);
        }else {
            echo $this->blade->render('error');
        }
    }
    public function updateBio(){
        $newBio = $_POST['bio'];
        $id = $_SESSION['user']['id'];
        if($newBio != null && $id != null){
            $result = $this->model->update('usr_bio', $newBio, $id);
            if($result['success']){
                Flight:: redirect('/profile');
            } else {
                $_SESSION['feedback'] = "unexpected";
                Flight::redirect('/profile');
            }

            
        }

        
        
    }    


    public function updatePic(){

        $uploadPath = new \Upload\Storage\FileSystem('../Spectrum/archives/users');
        $pic = new \Upload\File('newPicture', $uploadPath);

        $new_picname = uniqid();
        $new_picname = md5($new_picname);
        $pic->setName($new_picname);

        $pic->addValidations(array(
            // Ensure file is of type "image/png"
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
        
            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))
        
            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('16M')
        ));

        $picData = array(
            'name'       => $pic->getNameWithExtension(),
            'extension'  => $pic->getExtension(),
            'mime'       => $pic->getMimetype(),
            'size'       => $pic->getSize(),
        );



        $newPic = $pic->getNameWithExtension();
        $id = $_SESSION['user']['id'];
        if($newPic != null && $id != null){
            $pic->upload();
            $result = $this->model->update('usr_foto', $newPic, $id);
            if($result['success']){
                Flight:: redirect('/profile');
            } else {
                $_SESSION['feedback'] = "unexpected";
                Flight::redirect('/profile');
            }

            
        }

        
        
    }    




}

?>