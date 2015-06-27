<div class="main">

    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/account/login" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required="required" pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="Username"/>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required="required" pattern="[a-zA-Z0-9 /\\@#$%&]+" placeholder="******"/>

            <input type="submit" name="submit" value="Login"/>
    </form>

</div>