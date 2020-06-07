<?php

Route::localizedGroup(function () {
    Route::prefix(config('cms.uri'))->as(config('cms.admin_prefix'))->group(function () {
        Route::resource('DummySlug', 'Admin\IndexController')->except(['show']);
    });
});
