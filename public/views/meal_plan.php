<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/meal_plan.css">
    <script src="https://kit.fontawesome.com/a0e770b090.js" crossorigin="anonymous"></script>
    <script src="public/js/drop_down_menu.js" defer></script>
    <script src="public/js/calendar.js" defer></script>
    <title>MEAL PLAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>
    <div class="base-container">
        <?php
        include('nav.php');
        ?>
        <main>
            <header>
                <div>Meal plan</div>
            </header>
            <section class='calendar'>
                <div class="wrapper">
                    <p class="current-date">December 29</p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded">chevron_left</span>
                        <span id="next" class="material-symbols-rounded">chevron_right</span>
                    </div>
                    <div class="cal">
                        <div class="weeks">
                            <span>Sun</span>
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                        </div>
                        <div class="days"></div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
