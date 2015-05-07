<div class="main">
    <h1><?= htmlspecialchars($this->title); ?></h1>

    <table class="profileTable">
        <?php foreach ($this->users as $user) : ?>
            <tr>
                <td class="userProfileTd"><strong>Username: </strong></td>
                <td class="userProfileTd"><?= htmlspecialchars($user['username']) ?></td>
            </tr>
            <?php if ($user['fname'] != NULL) : ?>
                <tr>
                    <td class="userProfileTd"><strong>First name: </strong></td>
                    <td class="userProfileTd"><?= htmlspecialchars($user['fname']) ?>:</td>
                </tr>
            <?php endif ?>
            <?php if ($user['lname'] != NULL) : ?>
                <tr>
                    <td class="userProfileTd"><strong>Last name: </strong></td>
                    <td class="userProfileTd"><?= htmlspecialchars($user['lname']) ?>:</td>
                </tr>
            <?php endif ?>
            <tr>
                <td class="userProfileTd"><strong>Email: </strong></td>
                <td class="userProfileTd"><?= htmlspecialchars($user['email']) ?></td>
            </tr>
            <tr>
                <td class="userProfileTd"><strong>Your user status is: </strong></td>
                <?php if ($user['isAdmin'] < 1) : ?>
                    <td class="userProfileTd okBox">Normal user</td>
                <?php else : ?>
                    <td class="userProfileTd infobox">Administrator</td>
                <?php endif ?>
            </tr>
            <?php if ($_SESSION['isAdmin'] > 0) : ?>
                <tr>
                    <td class="warningBox"><a href="/account/deleteUser/<?= $user['id'] ?> ">[DELETE]</a></td>
                    <?php if ($user['isAdmin'] == 0) : ?>
                        <td class="infobox"><a href="/account/promoteAdmin/<?= $user['id'] ?> ">[Promote to Admin]</a>
                        </td>
                    <?php endif ?>
                    <?php if ($user['isAdmin'] == 1) : ?>
                        <td class="warningBox"><a href="/account/downgradeAdmin/<?= $user['id'] ?> ">[Downgrade to Normal]</a></td>
                    <?php endif ?>
                </tr>
            <?php endif ?>
        <?php endforeach ?><strong></strong>
        <!--        <tr>-->
        <!--            <td class="userProfileTd">-->
        <!--                <a href="/account/editProfile">Edit profile</a>-->
        <!--            </td>-->
        <!--        </tr>-->
    </table>

</div>