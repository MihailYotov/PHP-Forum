<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <table class="profileTable">
        <?php foreach ($this->users as $user) : ?>
            <tr>
                <td class="userProfileTd"><strong>Username: </strong></td>
                <td class="userProfileTd"><?= htmlspecialchars($user['username']) ?></td>
            </tr>
            <?php if($user['fname'] != NULL) : ?>
                <tr>
                    <td class="userProfileTd"><strong>First name: </strong></td>
                    <td class="userProfileTd"><?= htmlspecialchars($user['fname']) ?>: </td>
                </tr>
            <?php endif ?>
            <?php if($user['lname'] != NULL) : ?>
                <tr>
                    <td class="userProfileTd"><strong>Last name: </strong></td>
                    <td class="userProfileTd"><?= htmlspecialchars($user['lname']) ?>: </td>
                </tr>
            <?php endif ?>
            <tr>
                <td class="userProfileTd"><strong>Email: </strong></td>
                <td class="userProfileTd"><?= htmlspecialchars($user['email']) ?></td>
            </tr>
            <tr>
                <td class="userProfileTd"><strong>Your user status is: </strong></td>
                <?php if($user['isAdmin'] < 1) : ?>
                    <td class="userProfileTd">Normal user</td>
                    <?php else : ?>
                    <td class="userProfileTd">Administrator</td>
                <?php endif ?>
            </tr>
        <?php endforeach ?><strong></strong>
<!--        <tr>-->
<!--            <td class="userProfileTd">-->
<!--                <a href="/account/editProfile">Edit profile</a>-->
<!--            </td>-->
<!--        </tr>-->
    </table>

</div>