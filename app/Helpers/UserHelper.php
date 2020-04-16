<?php
use App\User;
use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public static function formatPermCell(array $user)
  {
      switch ($user['role_id'])
      {
          case User::REGISTERED:
              $html = "<span class=\"gray\">Registered </span>\n";
              break;
          case User::MODERATOR:
              $html = "<span class=\"blue\">Moderator </span>\n";
              break;
          case User::MANAGER:
              $html = "<span class=\"green\">Manager </span>\n";
              break;
          case User::ADMIN:
              $html = "<span class=\"red\">Admin </span>\n";
      }
      if ($user['role_id'] > User::ADMIN && $user['id'] > 1)
      {
          $html .= "<a href=\"".env('APP_URL')."/user/permissions-up/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"10\" height=\"10\" />
                    </a>\n";
      }
      else
      {
          $html .= "<img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"10\" height=\"10\" />\n";
      }
      if ($user['role_id'] < User::REGISTERED && $user['id'] > 1 && $user['id'] != Auth::user()->id)
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
        if (Auth::user()->role_id === User::ADMIN)
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
?>
