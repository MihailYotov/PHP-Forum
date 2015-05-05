<div class="main">
    <h1><?= htmlspecialchars($this->title);?></h1>

    <a href="/authors/create">Ask a question</a>

    <table>
        <?php foreach ($this->questions as $question) : ?>
        <tr>
            <th><a href="questions/viewQuestion/<?= $question['id'] ?> "><?= htmlspecialchars($question['title']) ?></a></th>
        </tr>

        <?php endforeach ?>
    </table>




</div>