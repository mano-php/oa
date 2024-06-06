<?php

namespace ManoCode\Oa\Http\Controllers;

use Slowlyo\OwlAdmin\Controllers\AdminController;

class OaController extends AdminController
{
    public function index()
    {
        $page = $this->basePage()->body('Oa Extension.');

        return $this->response()->success($page);
    }
}
