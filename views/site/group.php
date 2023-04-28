<nav class="info">
    <p>Группы (<a href="<?= app()->route->getUrl('/create-group'); ?>">создать</a>)</p>
    <div>
        <p>Номер группы</p>
        <p>Редактировать</p>
        <p>Удалить</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/group-discipline') . '?id=' . $group->id . ">" . $group->number . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/update-group') . '?id=' . $group->id . ">" . 'Редактировать' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . '<a href="#">' . 'Удалить' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
