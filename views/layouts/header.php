<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="<?= BASE_URL ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">
    <title><?= isset($data->title) ? $data->title  : '' ?> | Dash UI - Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>assets/images/favicon/favicon.ico">

    <!-- Libs CSS -->
    <link href="<?= BASE_URL ?>assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/libs/mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/theme.min.css">
    <!--Custom css -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/custom.css">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <main id="main-wrapper" class="<?= isset($data->class) ? $data->class : 'main-wrapper' ?>">