<div class="main">

    <div id="questionBox">
        <?php foreach ($this->questions as $question) : ?>
            <h3><?= htmlspecialchars($question['title']) ?></h3>
            <h4>Asked by: <?= htmlspecialchars($question['userName']) ?> / Category: <?= htmlspecialchars($question['category']) ?></h4>
            <div><strong><?= htmlspecialchars($question['content']) ?><strong></div>
            <h3><a href="/questions/createAnswer/<?= $question['id'] ?> ">Answer the question</a></h3>

        <?php endforeach ?>
    </div>


    <?php if ($this->answers) : ?>
        <table class="responsesTable">

            <?php foreach ($this->answers as $answer) : ?>
                <tr>
                    <?php if($answer['userName'] != NULL) : ?>
                        <th class="answeredUserId"><?= htmlspecialchars($answer['userName']) ?>:</th>
                        <?php if($answer['userEmail']) : ?>
                            <td>/ With email: <?= htmlspecialchars($answer['userEmail']) ?></td>
                        <?php endif ?>
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