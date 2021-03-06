// If you're interested in automating more control, check out gulpjs.com for more dependencies
// This is meant as a starting point. You can do a LOT more with gulpjs than this

// Requiring dependencies here, make sure to add them via the terminal
import gulp from 'gulp';
import sass from 'gulp-sass';
import concat from 'gulp-concat';
import minify from 'gulp-minify';

// Need to create a /css folder and a /sass folder inside the /css folder
gulp.task('build-that-css', function() {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('css/'));
});
// Obviously enqueue this new css file "main.css" in your functions.php

gulp.task('compress-that-js', function() {
  return gulp.src('./jsworking/*.js')
    // .pipe(minify({
    // 	ext: {
    // 		src: 'bundle.js', // create main.js for all your extra theme JS
    // 		// min: '.min.js'
    // 	} 
    // }))
    .pipe(concat('bundle.js'))
    .pipe(gulp.dest('js/'))
	// enqueue this minified file in your functions.php file 
});

// Gulp is watching you and your coding with the command: gulp watch
gulp.task('watch', function() {
  gulp.watch('./sass/*.scss', gulp.series('build-that-css'));
  gulp.watch('./jsworking/*.js', gulp.series('compress-that-js'));
});

// gulp.task('default', ['watch']);
gulp.task('default', gulp.series('watch'));