<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Note Taker</title>
        <link rel="stylesheet" href="/assets/css/bulma.min.css">
    </head>
    <body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
        <h1><?php echo $_SESSION['is_admin']?></h1>
        <section class="hero is-medium is-info is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Notes application
                    </h1>
                    <h2 class="subtitle">
                        Your local note taking utility
                    </h2>
                    <h2> You are logged in as <b><?php echo $_SESSION['username']; ?></b></h2>
                    <button class="button is-danger"><a href="/logout.php">logout</a></button>
                    <button class="button is-success"><a href="/add_note.php">New Note</a></button>
                    <button class="button is-success"><a href="/list_notes.php?user_id=<?php echo $_SESSION['user_id'];?>">List Notes</a></button>
                    
                </div>
            </div>
        </section>
        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true): ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h3 class="title is-3 has-text-centered">Environment</h3>
                        <hr>
                        <div class="content">
                            <ul>
                                <li><?= apache_get_version(); ?></li>
                                <li>PHP <?= phpversion(); ?></li>
                                <li>
                                    <?php
                                    $link = mysqli_connect("database", "root", $_ENV['MYSQL_ROOT_PASSWORD'], null);

/* check connection */
                                    if (mysqli_connect_errno()) {
                                        printf("MySQL connecttion failed: %s", mysqli_connect_error());
                                    } else {
                                        /* print server version */
                                        printf("MySQL Server %s", mysqli_get_server_info($link));
                                    }
                                    /* close connection */
                                    mysqli_close($link);
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="column">
                        <h3 class="title is-3 has-text-centered">Quick Links</h3>
                        <hr>
                        <div class="content">
                            <ul>
                                <li><a href="/phpinfo.php">phpinfo()</a></li>
                                <li><a href="http://localhost:<? print $_ENV['PMA_PORT']; ?>">phpMyAdmin</a></li>
                                <li><a href="/test_db.php">Test DB Connection with mysqli</a></li>
                                <li><a href="/test_db_pdo.php">Test DB Connection with PDO</a></li>
                                <li><a href="/list_users.php">List System Users</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php else: ?>
            <section class="hero is-medium is-info is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        LAMP STACK - CF Edit
                    </h1>
                    <h2 class="subtitle">
                        Please login before visiting index
                    </h2>
                    <button class="button is-success"><a href="/login_page.php">Login to account</a></button>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </body>
</html>
              