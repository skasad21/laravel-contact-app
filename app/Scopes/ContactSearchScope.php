<?php

namespace App\Scopes;

class ContactSearchScope extends SearchScope{
    protected $searchCollumns = ['first_name','last_name','email','company.name'];
}