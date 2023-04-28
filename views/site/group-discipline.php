<nav class="info-student">
    <nav class="list-discipline">
        <p>Список семестров в группе <?= $groups['number']; ?></p>
        <div>
            <ul>
                <?php
                foreach ($group_disciplines as $group_discipline) {
                    echo '<li>' . '<div>' . '<a href="/server/group-discipline?id=' . $_GET['id'] . '&id_semester=' . $group_discipline->groupDisciplines->semester . '">' . $group_discipline->groupDisciplines->semester . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
