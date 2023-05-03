<nav class="info-discipline">
    <p>Дисциплина <?php
        foreach ($disciplines as $discipline) {
            echo $discipline->title;
        }
        ?>
    </p>
    <div>
        <p>Дисциплина</p>
        <p>Часы</p>
        <p>Семестр</p>
        <p>Контроль</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . $discipline->title . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . $discipline->hours . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . $discipline->semester . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($disciplines as $discipline) {
                    echo '<li>' . '<div>' . $discipline->controlDisciplines->title . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
