<?php

namespace DummyNamespace\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use DummyNamespace\Models\DummyName;

class IndexController extends Admin
{
    /**
     * DummyName model instance.
     *
     * @return DummyName
     */
    public function getModel()
    {
        return new DummyName();
    }
}
