<div class="main">

    <h1><?= htmlspecialchars($this->title); ?></h1>

    <form action="/account/editProfile" method="post">
<!--            <label for="username">Username: </label>-->
<!--            <input type="text" id="username" name="username"/>-->

            <?php foreach ($this->users as $user) : ?>
<!--                <label for="password">Password: </label>-->
<!--                <input type="password" id="password" name="password" value="--><?//= htmlspecialchars($user['password']) ?><!--"/>-->

                <label for="fName">Name:</label>
                <input type="text" id="fName" name="fName" value="<?= htmlspecialchars($user['fname']) ?>"/>

                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lName" value="<?= htmlspecialchars($user['lname']) ?>"/>

                <label for="email">Email: </label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"/>

                <input type="submit" name="submit" value="Edit"/>
            <?php endforeach ?>
    </form>

</div>