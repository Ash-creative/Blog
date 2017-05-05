<?php
include("app/model/users/update.php");
update_user();

header("location: ?module=users&action=list");