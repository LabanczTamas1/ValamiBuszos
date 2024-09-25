<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include __DIR__ . '/../components/head.php'; ?>

</head>

<body class="helping_quary">
<header>

<?php include __DIR__ . '/../components/navbar.php'; ?>

    </header>

    <?php include __DIR__ . '/../components/card.php'; ?>
    <?php include __DIR__ . '/../components/card.php'; ?>
    <?php include __DIR__ . '/../components/card.php'; ?>
    <?php include __DIR__ . '/../components/card.php'; ?>

    <?php if (!App\Helper::isAuth()) : ?>
        <div class="container home-container">
            <?php $this->include('components/flashMessage') ?>


           
    <?php else : ?>


        <?php $this->include('components/flashMessage') ?>
        <?= $content ?>


    <?php endif; ?>

    <?php $this->include('components/footer') ?>

</body>

</html>