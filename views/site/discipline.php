<nav class="info">
    <p>Дисциплины (<a href="<?= app()->route->getUrl('/create-discipline'); ?>">создать</a>)</p>
    <div>
        <p>Дисциплина</p>
        <p>Редактировать</p>
        <p>Удалить</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . $discipline->title . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/update-discipline') . '?id=' . $discipline->id . ">" . 'Редактировать' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . '<a href="#">' . 'Удалить' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
