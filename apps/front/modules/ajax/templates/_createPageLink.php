<?php
//$count = count($listApiAll);
//$page = (int)(!isset($_REQUEST['pageId']) ? 1 : $_REQUEST['pageId']);
//$page = ($page == 0 ? 1 : $page);
//$start = ($page - 1) * $limit;
$adjacents = "2";
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count / $limit);
$lpm1 = $lastpage - 1;
$pagination = "";
if ($lastpage > 1) {
    $pagination .= "<div class='pagination'>";
    if ($page > 1)
        $pagination .= "<a href=\"#page=" . ($prev) . "\" onClick='changePagination(" . ($prev) . ");'>&laquo;&nbsp;</a>";
    else
        $pagination .= "<a href='javascript:' class='disabled'>&laquo;&nbsp;</a>";
    if ($lastpage < 7 + ($adjacents * 2)) {
        for ($counter = 1; $counter <= $lastpage; $counter++) {
            if ($counter == $page)
                $pagination .= "<a class='current' href='#'>$counter</a>";
            else
                $pagination .= "<a href=\"#page=" . ($counter) . "\" onClick='changePagination(" . ($counter) . ");'>$counter</a>";

        }
    } elseif ($lastpage > 5 + ($adjacents * 2)) {
        if ($page < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                if ($counter == $page)
                    $pagination .= "<a href='#' class='current'>$counter</a>";
                else
                    $pagination .= "<a href=\"#page=" . ($counter) . "\" onClick='changePagination(" . ($counter) . ");'>$counter</a>";
            }
            $pagination .= "<a href='javascript:'>...</a>";
            $pagination .= "<a href=\"#page=" . ($lpm1) . "\" onClick='changePagination(" . ($lpm1) . ");'>$lpm1</a>";
            $pagination .= "<a href=\"#page=" . ($lastpage) . "\" onClick='changePagination(" . ($lastpage) . ");'>$lastpage</a>";

        } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
            $pagination .= "<a href=\"#page=\"1\"\" onClick='changePagination(1);'>1</a>";
            $pagination .= "<a href=\"#page=\"2\"\" onClick='changePagination(2);'>2</a>";
            $pagination .="<a href='javascript:'>...</a>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                if ($counter == $page)
                    $pagination .= "<a href='#' class='current'>$counter</a>";
                else
                    $pagination .= "<a href=\"#page=" . ($counter) . "\" onClick='changePagination(" . ($counter) . ");'>$counter</a>";
            }
            $pagination .= "<a href='javascript:'>...</a>";
            $pagination .= "<a href=\"#page=" . ($lpm1) . "\" onClick='changePagination(" . ($lpm1) . ");'>$lpm1</a>";
            $pagination .= "<a href=\"#page=" . ($lastpage) . "\" onClick='changePagination(" . ($lastpage) . ");'>$lastpage</a>";
        } else {
            $pagination .= "<a href=\"#page=\"1\"\" onClick='changePagination(1);'>1</a>";
            $pagination .= "<a href=\"#page=\"2\"\" onClick='changePagination(2);'>2</a>";
            $pagination .= "<a href='javascript:'>...</a>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<a href='#' class='current'>$counter</a>";
                else
                    $pagination .= "<a href=\"#page=" . ($counter) . "\" onClick='changePagination(" . ($counter) . ");'>$counter</a>";
            }
        }
    }
    if ($page < $counter - 1)
        $pagination .= "<a href=\"#page=" . ($next) . "\" onClick='changePagination(" . ($next) . ");'> &raquo;</a>";
    else
        $pagination .= "<a href='javascript:' class='disabled'> &raquo;</a>";

    $pagination .= "</div>";
}
?>
<div class="paging divclear"><?php echo $pagination; ?></div>