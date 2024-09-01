<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Display the title of the page -->
    <title><?php echo $title; ?></title>
    <!-- Include Police files if they are set -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php if (isset($policeFiles)) : ?>
        <?php foreach ($policeFiles as $policeFile) : ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($policeFile); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Include CSS files if they are set -->
    <?php if (isset($cssFiles)) : ?>
        <?php foreach ($cssFiles as $cssFile) : ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($cssFile); ?>">
        <?php endforeach; ?>
    <?php endif; ?>

</head>

<body>
    <!-- Display the main content of the page -->
    <?php echo $content; ?>

    <!-- Include JavaScript files if they are set -->
    <?php if (isset($jsFiles)) : ?>
        <?php foreach ($jsFiles as $jsFile) : ?>
            <script src="<?php echo htmlspecialchars($jsFile); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>