<?php
namespace App\Repositoryinterface;

interface UsersRepositoryinterface{


    public function login($request);
    public function signup($request);
    public function profile_update();
    public function profile_details();
    public function verificationcode($request);
    public function forgotpassword($request);
    public function change_password();
    public function check_point();
    public function resend_code($request);
    public function lawyer_by_id($id);
    public function booking_lawyer();


}

