<?php
// This one is just for Saving and Uploading a Text based file you working on.
echo "<h2>Minifying Javascripts to application.min.js</h3>";

function mapToAssetPaths($n)
{
    $projectDirectory = getenv('TM_PROJECT_DIRECTORY');
    return("$projectDirectory/assets/$n");
}

$jsFiles          = explode(",",$js_files);
$jsFilepaths      = array_map("mapToAssetPaths", $jsFiles);


$filePath         = getenv('TM_PROJECT_DIRECTORY')."/assets/application.min.js";

echo "Minifying Javascript to {$filePath}...<br>";

system(sprintf('uglifyjs %1$s -m -c -o %2$s', implode(" ",$jsFilepaths), $filePath));

echo 'Done.';
