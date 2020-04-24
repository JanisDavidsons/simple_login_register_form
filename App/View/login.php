<nav>
        <a href='/register'  >Register</a>
</nav>
<br>

<form action='/loadUser'  method="post">
    <label>
        <input class="post"
               type="text"
               name="username"
               placeholder="Enter your username"
               required
        />
    </label>
    <br><br>

    <label>
        <input class="post"
               type="text"
               name="password"
               placeholder="Enter your password"
               required
        />
    </label><br><br>

    <input type="submit" value="Submit">
</form
<br>

<nav>
        <a href='/showResetPage'  >Forgot password</a>
</nav>

<?php
if (isset($variables)):?>
    <p>
        <?php echo implode($variables);?>
    </p>
<?php endif;?>