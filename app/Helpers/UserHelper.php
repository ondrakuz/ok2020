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
              $html = '<span class="gray">Registered</span>';
              break;
          case User::MODERATOR:
              $html = '<span class="blue">Moderator</span>';
              break;
          case User::MANAGER:
              $html = '<span class="green">Manager</span>';
              break;
          case User::ADMIN:
              $html = '<span class="red">Admin</span>';
      }
      if ($user['role_id'] < User::MANAGER && $user['id'] > 1)
      {
          $html .= "<a href=\"".env('APP_URL')."/administrator/uzivatele/permissions-up/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"16\" height=\"16\" />
                    </a>";
      }
      else
      {
          $html .= "<img src=\"".env('APP_URL')."/assets/icons/arrow_up.png\" width=\"16\" height=\"16\" />";
      }
      if ($user['role_id'] > User::REGISTERED && $user['id'] > 1)
      {
          $html .= "<a href=\"".env('APP_URL')."/administrator/uzivatele/permissions-down/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/arrow_down.png\" width=\"16\" height=\"16\" />
                    </a>";
      }
      else
      {
          $html .= "<img src=\"".env('APP_URL')."/assets/icons/arrow_down.png\" width=\"16\" height=\"16\" />";
      }
      
      return $html;
    }
  
    public static function formatEditCell($nick)
    {
        if (Auth::user()->role_id === User::ADMIN)
        {
            $html = "<a href=\"".env('APP_URL')."/administrator/uzivatele/edit/$nick\">
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
        if (($user['id'] != 1)&&
            ($user['id']!=Auth::user()->id))
        {
            $html = "<a href=\"".env('APP_URL')."/administrator/uzivatele/delete/$user[nick]\">
                        <img src=\"".env('APP_URL')."/assets/icons/bin_closed.png\" />
                    </a>";
        }
        else
        {
            $html = "<img src=\"".env('APP_URL')."/assets/icons/bin_closed.png\" />";
        }
        return $html;
    }

  private function getProtocol()
  {
      if (!empty($_SERVER['HTTPS'])) {
          return 'https';
      }
      else
      {
          return 'http';
      }
  }
}
?>
