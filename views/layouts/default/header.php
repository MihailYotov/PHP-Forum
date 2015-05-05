<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php if (isset($this->title)) echo(htmlspecialchars($this->title)) ?></title>
    <link rel="stylesheet" href="/content/style.css"/>
</head>
<body>
<header>
    <div id="logo"><a href="/"><img src="/content/images/DForum-Logo.png" alt=""/></a></div>

    <div class="nav">
        <ul>
            <li><a href="/">Home</a></li>
            <?php if(!$this->isLoggedIn) : ?>
            <li><a href="/account/register">Register</a></li>
            <li><a href="/account/login">Login</a></li>
            <?php endif ?>
            <li><a href="/questions">Questions</a></li>
        </ul>
    </div>

    <?php if($this->isLoggedIn) : ?>
        <div id="logedInBox">
            <span>Welcome, <?php echo($_SESSION['username']); ?></span>
            <span>id = <?php echo($_SESSION['userId']); ?></span>

            <form action="/account/logout">
                <input type="submit" name="submit" value="Logout" />
            </form>
        </div>
    <?php endif ?>

</header>