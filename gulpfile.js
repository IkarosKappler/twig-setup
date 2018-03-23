
var del = require('del');
var del = require('del');
var gulp = require('gulp');
var filesExist = require('files-exist');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var runSequence = require('run-sequence');

//script paths
var jsFiles = [
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
    jsDest = './dist/',
    concatFilename = 'girih.js';

gulp.task('clean', function() {
    return Promise.all([
        del(concatFilename),
        del('girih.min.js')
    ]);
});

gulp.task('concat', function() {
    return gulp.src(filesExist(jsFiles))
        .pipe(concat(concatFilename))
        .pipe(gulp.dest(jsDest));
});

gulp.task('uglify', function() {
    return gulp.src(jsDest+concatFilename)
	.pipe(uglify())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest(jsDest));
});

gulp.task('default', function() {
    return runSequence( 'clean', 'concat', 'uglify' ); 
});

