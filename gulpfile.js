"strict mode";
/**
 * This gulp script concatenates and minifies all my scripts.
 *
 * @author  Ikaros Kappler
 * @version 1.0.0
 * @date    2018-03-23
 **/

var copy = require('copy');
var del = require('del');
var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');
var filesExist = require('files-exist');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var runSequence = require('run-sequence');
var sourcemaps = require('gulp-sourcemaps');


//script paths
var coreFiles = [
        'public/js/pageheader.js',
        'public/js/mediaquerydetection.js',
        'public/js/canvasResize.js'
    ],	
    girihFiles = [
	'src/girih_frontpage/js/ikrs/IKRS.js',
	'src/girih_frontpage/js/ikrs/IKRS.Object.js',
	'src/girih_frontpage/js/ikrs/IKRS.Pair.js',
	'src/girih_frontpage/js/ikrs/IKRS.TileAlign.js',
	'src/girih_frontpage/js/ikrs/IKRS.Point2.js',
	'src/girih_frontpage/js/ikrs/IKRS.Line2.js',
	'src/girih_frontpage/js/ikrs/IKRS.Polygon.js',
	'src/girih_frontpage/js/ikrs/IKRS.Circle.js',
	'src/girih_frontpage/js/ikrs/IKRS.BoundingBox2.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.Decagon.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.Pentagon.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.IrregularHexagon.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.Rhombus.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.BowTie.js',
	'src/girih_frontpage/js/ikrs/IKRS.Tile.PenroseRhombus.js',
	'src/girih_frontpage/js/ikrs/IKRS.Girih.js',
	'src/girih_frontpage/js/ikrs/IKRS.GirihCanvasHandler.js',
	'src/girih_frontpage/js/ImageFileReader.js',
	'src/girih_frontpage/js/main.js'
    ],
    cssFiles = [
	'public/css/base.css',
	'public/css/pageheader.css',
	'public/css/navigation-underlines.css',
	'public/css/index.css',
	'public/css/blog.css',
	'public/css/contact.css'
    ],
    jsDest = './dist/',
    coreFilename = 'core.js',
    girihFilename = 'girih.js',
    cssFilename = 'styles.css';

gulp.task('clean', function() {
    return Promise.all([
        del(coreFilename),
        del('core.min.js'),
	del(girihFilename),
        del('girih.min.js'),
    ]);
});

gulp.task('concat-core', function() {
    return gulp.src(filesExist(coreFiles))
        .pipe(concat(coreFilename))
        .pipe(gulp.dest(jsDest));
});

gulp.task('concat-girih', function() {
    return gulp.src(filesExist(girihFiles))
        .pipe(concat(girihFilename))
        .pipe(gulp.dest(jsDest));
});

gulp.task('uglify', function() {
    return gulp.src([jsDest+coreFilename,jsDest+girihFilename])
	.pipe(uglify())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest(jsDest));
});

gulp.task('concat-css', function() {
    return gulp.src(filesExist(cssFiles))
        .pipe(concat(cssFilename))
        .pipe(gulp.dest(jsDest));
});

gulp.task('minify-css', function() {
    // I wonder: how do I obtain the sourcemap data and
    // write that into a separate file?
    // (not to the end of the minified style.css)
    return gulp.src(jsDest+cssFilename)
      .pipe(sourcemaps.init())
      .pipe(cleanCSS( { sourceMap: true, compatibility: 'ie8' } ))
      .pipe(rename({suffix: '.min'}))
      // Source Maps just blow up the code size
      // .pipe(sourcemaps.write())
      .pipe(gulp.dest(jsDest));
});

gulp.task('publish', function() {
    return Promise.all([
        copy(jsDest+'/*.js', 'public/js/', function(err,files) { if (err) throw err; else console.log('[copy]  JS files copied.'); } ),
	copy(jsDest+'/*.css', 'public/css/', function(err,files) { if (err) throw err; else console.log('[copy] CSS Files copied.'); } )
    ]);
});

gulp.task('default', function() {
    return runSequence( 'clean', 'concat-core', 'concat-girih', 'uglify', 'concat-css', 'minify-css', 'publish' ); 
});

