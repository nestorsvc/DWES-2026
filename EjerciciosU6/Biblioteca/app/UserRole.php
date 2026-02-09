<?php

namespace App;


enum UserRole: string
{
    case ADMIN = 'admin';
    case LIBRARIAN = 'librarian';
    case USER = 'user';
}
