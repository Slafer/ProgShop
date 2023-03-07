
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page=1">1</a>
        </li>
        <?php if($page != 2 and $page != 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo 1;?>">...</a>
            </li>
        <?php endif; ?>
        <?php if($page > 2):?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page - 1);?>"><?= ($page - 1); ?></a>
            </li>
        <?php endif; ?>
        <?php if(($page > 1) and ($page < $total_pages)):?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page);?>"><?= $page ?></a>
            </li>
        <?php endif; ?>
        <?php if($page < $total_pages-1):?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page + 1);?>"><?= ($page + 1); ?></a>
            </li>
        <?php endif; ?>
        <?php if($page != $total_pages - 1 and $page != $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $total_pages;?>">...</a>
            </li>
        <?php endif; ?>
        <?php if($total_pages != 1): ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $total_pages?>"><?=$total_pages ?></a>
        </li>
        <?php endif; ?>
    </ul>
</nav>