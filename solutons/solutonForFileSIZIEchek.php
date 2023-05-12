<?php
if(isset($_FILES['file'])) {
    if($_FILES['file']['size'] > 10485760) { //10 MB (size is also in bytes)
        // File too big
    } else {
        // File within size restrictions
    }
}
