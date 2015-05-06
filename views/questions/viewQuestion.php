<div class="main">

    <div id="questionBox">
        <?php foreach ($this->questions as $question) : ?>
            <h3><?= htmlspecialchars($question['title']) ?> - [<?= htmlspecialchars($question['category']) ?>]</h3>
            <div><strong><?= htmlspecialchars($question['content']) ?><strong></div>
            <h3><a href="/questions/createAnswer/<?= $question['id'] ?> ">Answer the question</a></h3>

        <?php endforeach ?>
    </div>


    <?php if ($this->answers) : ?>
        <table class="responsesTable">

            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <?php if($answer['userId'] != NULL) : ?>
                        <th class="answeredUserId"><?= htmlspecialchars($answer['userId']) ?>: </th>
                        <?php else : ?>
                        <th class="answeredUserId">Annonimus: </th>
                    <?php endif ?>
                </tr>
                <tr>
                    <td class="answeredContent"><?= htmlspecialchars($answer['content']) ?></td>
                </tr>
            <?php endforeach ?>

        </table>
    <?php endif ?>
</div>