<?php
// This one is just for Saving and Uploading a Text based file you working on.
echo "<h2>Minifying Javascripts to ".$minified_js_file."</h2>";

function mapToAssetPaths($n)
{
    $projectDirectory = getenv('TM_PROJECT_DIRECTORY');
    return("$projectDirectory/assets/$n");
}

$jsFilepaths      = array_map("mapToAssetPaths", $js_files);
$filePath         = getenv('TM_PROJECT_DIRECTORY')."/assets/".$minified_js_file;

if (!empty($jsFilepaths)) {
  echo "Minifying Javascript to {$filePath}...<br>";
  system(sprintf('uglifyjs %1$s -m -c -o %2$s', implode(" ",$jsFilepaths), $filePath));
  echo 'Done.';
} else {
  echo "No Javascript Files found to minify.";
}


