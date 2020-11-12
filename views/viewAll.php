<?php
        foreach($all as $movie)
        {
        ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($movie['title']); ?>
            
            </h3>
            <div><?= $movie['author']; ?> </div>
            <div><?= htmlspecialchars(substr($movie['content'], 0,49))."..."; ?></div>
            <a href="?id=<?= $movie['id'] ?> ">Voir le film</a>
        </div>
        <?php
        }
      
        ?>