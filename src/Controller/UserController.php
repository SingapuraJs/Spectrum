<?php 

namespace Controller;

use Controller\BaseController;
use Flight;
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
        if (isset($_SESSION['authenticated'])){
            Flight::redirect('/home');
            exit;
        }
        echo $this->blade->render('user/create');
    }

    public function store()
    {
        $all = [$_FILES['profile_pic']['name'], $_POST['username'], $_POST['email'],  $_POST['password']];
        $isEmpty = in_array("", $all);

        
        if($isEmpty){
            $_SESSION['feedback'] = "empty";
            Flight::redirect('./register');
            exit;
        }


        $uploadPath = new \Upload\Storage\FileSystem('../Spectrum/archives/users');
        $pic = new \Upload\File('profile_pic', $uploadPath);

        $new_picname = uniqid();
        $new_picname = md5($new_picname);
        $pic->setName($new_picname);

        $pic->addValidations(array(
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
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
                $errors = $pic->getErrors();
                var_dump($errors);

                $fileSizeError = 'File size is too large';

                if($errors[0] === $fileSizeError){
                    $_SESSION['feedback'] = 'fileSize';
                    Flight::redirect('/register');
                    exit;
                }

                $_SESSION['feedback'] = 'unexpected';
                Flight::redirect('/register');
                exit;
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
            new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
        
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
            
            
            try {
                $pic->upload();
            } catch (\Exception $e) {
                $errors = $pic->getErrors();
                var_dump($errors);

                $fileSizeError = 'File size is too large';

                if($errors[0] === $fileSizeError){
                    $_SESSION['feedback'] = 'fileSize';
                    Flight::redirect('/profile');
                    exit;
                }
                $_SESSION['feedback'] = 'unexpected';
                Flight::redirect('/profile');
                exit;
            }
            
            
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