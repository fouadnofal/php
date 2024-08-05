<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'superAdmin'; //مسئول الخدمة
    case Moderator = 'moderator';  //خادم مسئول 
    case Admin = 'admin';          //خادم
    case User = 'user';            //مخدوم
}
