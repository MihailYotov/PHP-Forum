<div class="main">

    <h1><?= htmlspecialchars($this->title);?></h1>

    <form action="/account/login" method="post">
        <fieldset>
            <legend>Login</legend>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required="required"/>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required="required"/>

            <input type="submit" name="submit" value="Login"/>

        </fieldset>
    </form>

</div>