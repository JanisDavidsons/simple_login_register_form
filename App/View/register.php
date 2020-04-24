<form action='/store'  method="post">
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
                   name="email"
                   placeholder="Enter your email"
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

<?php
if (isset($variables)):?>
        <p>
            <?php echo implode($variables);?>
        </p>
        <?php endif;?>