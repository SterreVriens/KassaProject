<?php
require("backend/header.php");
?>
        <main class="loginmain">
            <div class="login">
                <h1>Login</h1>
                <form action="backend/authenticate.php" method="post">
                    <input type="hidden" name="formType" value="login">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input class="UsrName" type="email" name="email" placeholder="Email" id="username" required>
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input class="UsrPswd" type="password" name="password" placeholder="Password" id="password" required>
                    <input type="submit" value="Login">
                </form>
            </div>
        </main>
<?php
require('backend/footer.php');
?>


