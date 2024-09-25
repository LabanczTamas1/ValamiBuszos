<?php
namespace App\Controllers;
use App\Models\User;
use App\Tools;

class RegisterController {
    public function InsertUser($post) {
        $dataarray['username'] = str_replace("'", "", $post['username']);
        $dataarray['email'] = str_replace("'", "", $post['email']);
        $dataarray['type'] = "User";

        if(empty($dataarray['username']) || empty($dataarray['email'])) {
            Tools::FlashMessage("Adjon meg helyes adatokat!", 'danger');
            return false;
        } else {
            if ($post['passwd1'] == $post['passwd2']) {
                $dataarray['password'] = Tools::Crypt($post['passwd1']);
            } else {
                Tools::FlashMessage("A jelszavak nem egyeznek!", 'danger');
                return false;
            }

            $userNamespace = new User;

            if ($userNamespace -> getItemBy('username', $dataarray['username'])) {
                Tools::FlashMessage("Már létezik ilyen nevű felhasználó!", 'danger');
                return false;
            }

            if ($userNamespace -> getItemBy('email', $dataarray['email'])) {
                Tools::FlashMessage("Már létezik ilyen email cím!", 'danger');
                return false;
            }

            $user = new User($dataarray);
            
            if ($user -> save()) {
                Tools::FlashMessage("Sikeres regisztráció!", 'success');
                //header('Location: /userhandle/login');
            }
        }
    }
}