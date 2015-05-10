<div class="main">
    <h1><?= htmlspecialchars($this->title); ?></h1>

    <div  class="allUsersList questionsList">
        <ul>
            <?php foreach ($this->users as $user) : ?>
                <li>
                    <?php if($user['id'] != $_SESSION['userId']) : ?>
                        <a href="/account/profile/<?= $user['id'] ?> "><?= htmlspecialchars($user['username']) ?></a>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>