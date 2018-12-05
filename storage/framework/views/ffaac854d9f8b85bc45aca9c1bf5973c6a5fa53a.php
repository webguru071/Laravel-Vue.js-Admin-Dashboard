<!DOCTYPE html>
<html>
    <head>
        <title>Platinum - Laravel & Vuejs SPA Admin Starter</title>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="Platinum - Laravel & Vuejs SPA Admin Starter" name="keywords">
        <meta content="Platinum - Laravel & Vuejs SPA Admin Starter" name="author">
        <meta content="Platinum - Laravel & Vuejs SPA Admin Starter" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="<?php echo e(asset('app/images/favicon.png')); ?>" rel="shortcut icon">
        <link href="<?php echo e(asset('app/images/favicon.png')); ?>" rel="apple-touch-icon">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo e(mix('app/css/assets.css')); ?>"/>
    </head>
    <body>
        <div id="main">
            <router-view></router-view>
        </div>
        <script type="text/javascript" src="<?php echo e(mix('app/js/vendor.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(mix('app/js/assets.js')); ?>"></script>
    </body>
</html>

