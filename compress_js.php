
<?php

// make sure to update the path to where you cloned the projects to!
$path = 'vendor/matthiasmullie';
require_once $path . '/minify/src/Minify.php';
require_once $path . '/minify/src/CSS.php';
require_once $path . '/minify/src/JS.php';
require_once $path . '/minify/src/Exception.php';
require_once $path . '/minify/src/Exceptions/BasicException.php';
require_once $path . '/minify/src/Exceptions/FileImportException.php';
require_once $path . '/minify/src/Exceptions/IOException.php';
require_once $path . '/path-converter/src/ConverterInterface.php';
require_once $path . '/path-converter/src/Converter.php';


use MatthiasMullie\Minify;
//$minifier = new Minify\CSS('body { color: red; }');
//echo $minifier->minify();

$minifier = new Minify\JS();
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.ArraySet.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.BoundingBox2.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Circle.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Edge.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Girih.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.GirihCanvasHandler.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Graph2.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Line2.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.LineOrderedPointSet2.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Object.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Pairjs');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Point2.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Polygon.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.PythagoreanPointComparator.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.BowTie.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.Decagon.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.IrregularHexagon.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.PenroseRhombus.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.Pentagon.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Tile.Rhombus.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.TileAlign.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.Triangle.js');
$minifier->add('public/js/girih_frontpage/js/ikrs/IKRS.TriangleSet.js');
$minifier->add('public/js/girih_frontpage/js/ImageFileReader.js');
$minifier->add('public/js/girih_frontpage/js/main.js');
$minifier->add('public/js/girih_frontpage/js/StringFileExporter.js');
 
$minifier->add('public/js/canvasResize.js');
$minifier->add('public/js/i2banim.js');
$minifier->add('public/js/pageheader.js');

echo $minifier->minify();

?>