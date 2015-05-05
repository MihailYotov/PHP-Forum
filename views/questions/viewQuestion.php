<div class="main">
    <table>
        <?php foreach ($this->questions as $question) : ?>
            <tr>
                <th><?= htmlspecialchars($question['title']) ?></th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($question['content']) ?></td>
            </tr>
        <?php endforeach ?>

        <?php foreach ($this->answers as $answer) : ?>
            <tr>
                <td><?= htmlspecialchars($answer['userId']) ?></td>
            </tr> <tr>
                <td><?= htmlspecialchars($answer['content']) ?></td>
            </tr>
        <?php endforeach ?>

    </table>
</div>