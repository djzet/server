<nav class="info-student">
    <p>Номер группы (прикрепление)</p>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($groups as $group) {
                    echo '<li>' . '<div>' . "<a href=" . app()->route->getUrl('/attach-group') . '?id=' . $group->id . ">" . $group->number . '</a>' . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
