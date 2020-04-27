<?php
namespace App\Helpers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\RoleHelper;

class UserHelper
{
    public static function formatPermCell(array $user)
  {
      //print_r($user); exit;
      $html = '';
      switch ($user['role_id'])
      {
          case RoleHelper::REGISTERED:
              $html .= "<span class=\"gray\">Registered </span>\n";
              break;
          case RoleHelper::MODERATOR:
              $html .= "<span class=\"blue\">Moderator </span>\n";
              break;
          case RoleHelper::MANAGER:
              $html .= "<span class=\"green\">Manager </span>\n";
              break;
          case RoleHelper::ADMIN:
              $html .= "<span class=\"red\">Admin </span>\n";
      }
      if ($user['role_id'] > RoleHelper::ADMIN && $user['id'] > 1)
      {
          $html .= "<a href=\"".env('APP_URL')."/user/permissions-up/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"10\" height=\"10\" />
                    </a>\n";
      }
      else
      {
          $html .= "<img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"10\" height=\"10\" />\n";
      }
      if ($user['role_id'] < RoleHelper::REGISTERED && $user['id'] > 1 && $user['id'] != Auth::user()->id)
      {
          $html .= "<a href=\"".env('APP_URL')."/user/permissions-down/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/arrow_down.png\" width=\"10\" height=\"10\" />
                    </a>\n";
      }
      else
      {
          $html .= "<img src=\"".env('APP_URL')."/assets/icons/arrow_down.png\" width=\"10\" height=\"10\" />\n";
      }
      
      return $html;
    }
  
    public static function formatEditCell($nick)
    {
        if (Auth::user()->role_id === RoleHelper::ADMIN)
        {
            $html = "<a href=\"".env('APP_URL')."/user/edit/$nick\">
                        <img src=\"".env('APP_URL')."/assets//icons/pencil.png\" width=\"16\" height=\"16\" />
                    </a>";
        }
        else
        {
            $html = "<img src=\"".env('APP_URL')."/assets//icons/pencil.png\" width=\"16\" height=\"16\" />";
        }
        return $html;
    }
    
    public static function formatDeleteCell($user)
    {
        if (($user['id'] != 1)&&($user['id']!=Auth::user()->id))
        {
            $html = "<a href=\"".env('APP_URL')."/user/delete/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/bin_closed.png\" />
                    </a>";
        }
        else
        {
            $html = "<img src=\"".env('APP_URL')."/assets/icons/bin_closed.png\" />";
        }
        return $html;
    }
}
