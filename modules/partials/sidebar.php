<?php $features = ['Feature 1', 'Feature 2', 'Feature 3', 'Feature 4', 'Feature 5']; ?>
<div id="sidebar">
    <h3> Sidebar </h3>
    <ul>
        <?php foreach ($features as $index => $feature) {
            echo "<li>$feature</li>";
        } ?>
    </ul>
</div>
