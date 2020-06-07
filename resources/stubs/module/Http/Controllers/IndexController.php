<?php

namespace DummyNamespace\Http\Controllers;

use App\Http\Controllers\Controller;
use DummyNamespace\Models\DummyName;

class IndexController extends Controller
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
