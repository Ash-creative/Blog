<?php
function paginate($nb_pages, $module, $action)
{
    echo "<ul class='ul_paginate'>";
    for($i=1; $i <= $nb_pages ; $i++)
    {
        echo'<li><a href="?'. $module .'=article&'. $action .'=index&page='. $i .'"> Page '. $i .' -&nbsp;</a></li>';
    }
    echo "</ul>";
}