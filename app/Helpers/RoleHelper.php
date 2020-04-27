<?php
namespace App\Helpers;

class RoleHelper
{
    // PERMISSIONS(ROLES)
    const REGISTERED = 4; // permission to write posts in article disscusion and to forum
    const MODERATOR = 3;  // permission to moderate article disscusion and forums
    const MANAGER = 2;    // permission to access administration and do anything except superadmin stuff
    const ADMIN = 1;      // permission to superadmin stuff (add users, site settings etc.)
}
