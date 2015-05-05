<div class="main">

    <div id="questionBox">
        <?php foreach ($this->questions as $question) : ?>
        <h3><?= htmlspecialchars($question['title']) ?></h3>
        <div><strong><?= htmlspecialchars($question['content']) ?><strong></div>
        <?php endforeach ?>
    </div>

    <?php if($this->answers) : ?>
        <table id="responsesTable">

            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <th class="answeredUserId"><?= htmlspecialchars($answer['userId']) ?></th>
                </tr>
                <tr>
                    <td><?= htmlspecialchars($answer['content']) ?></td>
                </tr>
            <?php endforeach ?>

        </table>
    <?php endif ?>
</div>