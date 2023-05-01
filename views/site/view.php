<nav class="info">
    <p>Пользователи (<a href="<?= app()->route->getUrl('/create'); ?>">создать</a>)</p>
    <div>
        <p>Пользователь</p>
        <p>Редактировать</p>
        <p>Удалить</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($users as $user) {
                    echo '<li>' . '<div>' . $user->login . ' - ' . '(' . $user->getRole->title . ')' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($users as $user) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/update') . '?id=' . $user->id . ">" . 'Редактировать' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($users as $user) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/delete') . '?id=' . $user->id . ">" . 'Удалить' . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
