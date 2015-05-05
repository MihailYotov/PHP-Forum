<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <?php if($this->isLoggedIn) : ?>
    <h3><a href="/questions/create">Ask a question</a></h3>
    <?php endif ?>

    <table>
        <?php foreach ($this->questions as $question) : ?>
        <tr>
            <th><a href="questions/viewQuestion/<?= $question['id'] ?> "><?= htmlspecialchars($question['title']) ?></a></th>
        </tr>

        <?php endforeach ?>
    </table>




</div>