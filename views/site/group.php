<nav class="info">
    <p>Группы</p>
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
                    echo '<li>' . '<div>' . '<a href="#">' . $group->number . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . '<a href="#">' . 'Редактировать' . '</a>' . '</div>' . '</li>';
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
