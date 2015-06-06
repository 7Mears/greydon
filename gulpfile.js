
// npm install --save-dev gulp gulp-html-prettify gulp-util gulp-uglifyjs gulp-concat gulp-watch gulp-compass gulp-plumber gulp-livereload

//////////

var gulp 					= require("gulp"),
		gutil 				= require("gulp-util"),
		concat				= require("gulp-concat"),
		watch 				= require("gulp-watch"),
		compass 			= require("gulp-compass"),
		uglify				= require('gulp-uglifyjs'),
		plumber				= require("gulp-plumber"),
		prettify 			= require('gulp-html-prettify'),
		livereload 		= require('gulp-livereload');

// Paths
var paths = {
	styles: {
		src: "./sass/**/*.scss",
		dest: "."
	}
};

// Error handler
function handleError(err) {
  console.log(err.toString());
  this.emit('end');
}

////////////////////////////////////////////////////////////////////////////////
////////// WEBSITE TASKS //////////
////////////////////////////////////////////////////////////////////////////////

//////////
// HTML
//////////

gulp.task('html', function() {
  gulp.src([
		'!./functions.php',
		'./*.php'
	])
    .pipe(prettify({indent_char: ' ', indent_size: 2}))
    .pipe(gulp.dest('./'))
});

//////////
// Sass
//////////

gulp.task("styles", function() {
	return gulp.src(paths.styles.src)
		.pipe(plumber())
		.pipe(compass({
			css: ".",
			sass: "./sass",
			image: "./images"
		}))
		.on('error', handleError)
		.pipe(plumber.stop())
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(livereload());
});

//////////
// JS
//////////

// minify
gulp.task('uglifyjs', function() {
  gulp.src([
		'!./js/app.js',
		'./js/*.js'
		])
	.pipe(uglify('app.js', {
		outSourceMap: true
	}))
    .pipe(gulp.dest('./js'))
});

// beautify
gulp.task('beautifyjs', function() {
	gulp.src([
		'!./js/app.js',
		'./js/*.js'
		])
    .pipe(uglify('app.js', {
      mangle: false,
      output: {
        beautify: true
      }
    }))
		.pipe(gulp.dest('./js'))
		.pipe(livereload());
});

////////////////////////////////////////////////////////////////////////////////
////////// WATCH AND BUILD TASKS //////////
////////////////////////////////////////////////////////////////////////////////

// watch
gulp.task('watch', function() {
	livereload.listen();
	// Watch Sass
	gulp.watch(paths.styles.src, ['styles']);
	// Watch JS
	gulp.watch('./js/script.js', ['beautifyjs']);
});

// Build task
gulp.task('build', ['styles', 'uglifyjs']);

// Default task
gulp.task('default', ['styles', 'beautifyjs']);
