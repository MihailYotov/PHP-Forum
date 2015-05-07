<div class="main">
    <h1><?= htmlspecialchars($this->title); ?></h1>

    <ul class="questionsList">
        <?php foreach ($this->users as $user) : ?>
            <li>
                <a href="/account/profile/<?= $user['id'] ?> "><?= htmlspecialchars($user['username']) ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>