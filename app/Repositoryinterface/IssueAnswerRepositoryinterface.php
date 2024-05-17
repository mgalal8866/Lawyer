<?php
namespace App\Repositoryinterface;

interface IssueAnswerRepositoryinterface{


    public function newanswer();
    public function myanswer();
    public function my_accept_offer_lawyer();
    public function my_accept_offer();
    public function accept_offer($id);


}

