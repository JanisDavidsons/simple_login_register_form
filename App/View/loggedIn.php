<ul>
    You are logged in !!
    <br><br>

    <?php
    if (isset($variables)) {

        foreach ($variables as $data) {
            foreach ($data as $key => $user):?>
                <li>
                    <?php echo $key . ' - ' . $user ?>
                </li>
            <?php endforeach;
        }
    } ?>
    <br><br>
    <nav>
        <ul>
            <li><a href='/logOut'  >Log out</a></li>
        </ul>
    </nav>
</ul>