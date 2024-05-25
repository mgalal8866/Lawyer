<?php
namespace App\Repositoryinterface;

interface IssueRepositoryinterface{


    public function get_all_issue();
    public function get_all_issue_by_city();
    public function newissue();
    public function myissue();
    public function get_issue_id($id);
    public function delete_issue($id);


}

