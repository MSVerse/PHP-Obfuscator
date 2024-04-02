<?php

/*
Title   : PHP Obfuscator Hex Bit
Author  : msverse
Visit   : https://www.msverse.site
GitHub  : https://github.com/msverse
*/

function obfuscate($data) {
    return bin2hex(base64_encode(gzcompress(base64_encode($data))));
}

if ($argc != 3) {
    echo "Usage: php obfuscator.php <input_file> <output_file>\n";
    exit(1);
}

$input_file = $argv[1];
$output_file = $argv[2];

if (!file_exists($input_file)) {
    echo "Error: Input file not found.\n";
    exit(1);
}

$source_code = file_get_contents($input_file);
$obfuscated_code = obfuscate($source_code);

$obfuscated_hex = '';
for ($i = 0; $i < strlen($obfuscated_code); $i++) {
    $obfuscated_hex .= sprintf('\x%02X', ord($obfuscated_code[$i]));
}

$output_content = "<?php\n\n/*\nobfuscate by msverse.site\nVisit: https://www.msverse.site\nGitHub : https://github.com/msverse\n*/\n\n\$obfuscate = \"$obfuscated_hex\"; eval(base64_decode(gzuncompress(base64_decode(hex2bin(\$obfuscate))))); ?>";

if (file_put_contents($output_file, $output_content) !== false) {
    echo "Obfuscation complete. Output file: $output_file\n";
} else {
    echo "Error writing to output file.\n";
    exit(1);
}
?>
