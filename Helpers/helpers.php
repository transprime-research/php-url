<?php

use Transprime\Package\Package;

if (! function_exists('package')) {
    /**
     * New up a Package
     *
     * @return Package
     */
    function package() {
        return new Package();
    }
}