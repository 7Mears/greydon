/*
* sudo npm install --save-dev gulp gulp-util gulp-concat gulp-watch gulp-compass gulp-plumber gulp-livereload
*/

var gulp 				= require("gulp"),
	gutil 				= require("gulp-util"),
	concat				= require("gulp-concat"),
	watch 				= require("gulp-watch"),
	compass 			= require("gulp-compass"),
	plumber				= require("gulp-plumber"),
	livereload = require('gulp-livereload')

var paths = {
	styles: {
		src: "./sass/**/*.scss",
		dest: "."
	}
};

function handleError(err) {
  console.log(err.toString());
  this.emit('end');
}

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


gulp.task("default", function() {
	livereload.listen();
	gulp.watch(paths.styles.src, ["styles"]);
});
