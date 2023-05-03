<nav class="info-student">
    <p>Номер группы (оценки)</p>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/rating-group') . '?id=' . $group->id . ">" . $group->number . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
