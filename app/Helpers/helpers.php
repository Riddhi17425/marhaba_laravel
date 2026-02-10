<?php

// use Route;

// APP FUNCTIONS
function appName() {
	return env('APP_NAME');
}

// ROUTE FUNCTIONS
function routePut($name, $args = []) {
	return $name && \Route::has($name) ? route($name, $args) : '#';
}
function routeCurrentName() {
	return \Route::getCurrentRoute()->getName();
}
function routeIsActive($name, $activeClass = "active") {
	return routeCurrentName() == $name ? $activeClass : '';
}


// BACKEND FUNCTIONS
function backendAssets($path) {
	return asset('backend/' . $path);
}
function backendView($key) {
	return 'backend.' . $key;
}
function backendRoute($key) {
	return 'backend.' . $key;
}
function backendRoutePut($key, $args = []) {
	return routePut(backendRoute($key), $args);
}

function sizeToMonths($size)
    {
        $size = trim($size);

        // Match patterns like 2-5Y, 6-12Y, 0m-9m, 3m-12m, 1-10Y
        if (!preg_match('/^(\d+)(m|Y)?\s*-\s*(\d+)(m|Y)?$/i', $size, $matches)) {
            return null;
        }

        // Extract numbers and units
        $min = (int)$matches[1];
        $minUnit = isset($matches[2]) && $matches[2] ? strtoupper($matches[2]) : 'Y';
        $max = (int)$matches[3];
        $maxUnit = isset($matches[4]) && $matches[4] ? strtoupper($matches[4]) : 'Y';

        // Convert to months
        $minMonths = $minUnit === 'Y' ? $min * 12 : $min;
        $maxMonths = $maxUnit === 'Y' ? $max * 12 : $max;

        return [
            'min' => $minMonths,
            'max' => $maxMonths
        ];
    }