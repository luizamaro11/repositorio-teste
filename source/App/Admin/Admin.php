<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Source\Core\View;
use Source\Models\Auth;
use Source\Models\User;

class Admin extends Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/");

        $this->user = Auth::user();

        if (!$this->user || $this->user->level < 5) {
            $this->message->error("Para acessar é preciso logar-se");
            redirect("/admin/login");
        }
    }
}