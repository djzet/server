<nav class="info-student">
    <nav class="list-discipline">
        <p>Список дисциплин</p>
        <div>
            <ul>
                <?php
                foreach ($group_disciplines as $group_discipline) {
                    echo '<li>' . '<div>' . '<a href="/server/progress-group?id=' . $_GET['id'] . '&id_discipline=' . $group_discipline->id_discipline . '">' . $group_discipline->groupDisciplines->title . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
