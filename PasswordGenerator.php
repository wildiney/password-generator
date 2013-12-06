<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasswordGenerator
 *
 * @author fernando
 */
class PasswordGenerator {

    public static function generate($length=8, $baseHash="abcdefghijklmnopqrstuvxyz0123456789") {
        $password = NULL;
        for ($i = 0; $i < $length; $i++) {
            $password .= $baseHash[rand(0, strlen($baseHash) - 1)];
        }

        return $password;
    }
}
