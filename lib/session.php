<?php
class Session{

   
    public  static function init(){
       
        session_start();

    }


    public static function set($key,$value){

        $_SESSION[$key]=$value;


    }

    public static function get($key){
        if(isset($_SESSION[$key])) 
        {
            return $_SESSION[$key];
        }
        else return false; 

        
    }


    public  static function destroy(){

        session_destroy();
        header("Location:login.php");
    }

    public static function checkLogin(){
        self::init(); //start session
        if(self::get("adminLogin")==true) //if it is logged
        {
            header("Location:login.php");
        }
    }

    public static function checkSession(){
        self::init();
        if(self::get("adminLogin")==false) //if the user is not logged in he can't acces the admin pages and redirects him
        {   self::destroy();
            header("Location:login.php");
        }
    }



}

?>