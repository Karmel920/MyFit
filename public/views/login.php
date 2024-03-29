<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="logo text-logo">
                <img src="public/img/logo_words.svg">
            </div>
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="input-header">Email</div>
                <input name="email" type="text" placeholder="email@email.com">
                <div class="input-header">Password</div>
                <input name="password" type="password" placeholder="password">
                <button class="button-login button-font" type="submit">Login</button>
                <button onclick="location.href='/register'" type="button" class="button-signup button-font">Sign up</button>
            </form>
        </div>
    </div>
</body>