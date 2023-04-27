<nav class="info">
    <p>Дисциплины</p>
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
                    echo '<li>' . '<div>' . '<a href="#">' . 'Редактировать' . '</a>' . '</div>' . '</li>';
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
