var gulp = require('gulp'),
sass = require('gulp-dart-sass'),
autoprefixer = require('gulp-autoprefixer'),
uglify = require('gulp-uglify'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
purgecss = require('gulp-purgecss'),
notify = require('gulp-notify'),
browserSync = require('browser-sync').create(),
cleanCSS = require('gulp-clean-css'),
postcss = require('gulp-postcss'),
assets  = require('postcss-assets');

gulp.task('scripts', function() {
    return gulp.src('src/js/**/*.js')
      .pipe(concat('assets/js/scripts.js'))
      .pipe(gulp.dest('.'))
      .pipe(rename({suffix: '.min'}))
      .pipe(uglify())
      .pipe(gulp.dest('.'))
      .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('process-styles', function () {
	return gulp.src(['./assets/css/theme.css','assets/css/theme.min.css'])
	  .pipe(postcss([assets({
		loadPaths: ['inc/bootstrap-icons/','assets/images/']
	  })]))
	  .pipe(gulp.dest('assets/css'));
  });

gulp.task('compile-styles', function() {
    return gulp.src('./src/scss/theme.scss')
      .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
      .pipe(autoprefixer('last 2 versions'))
      .pipe(gulp.dest('assets/css'))
      .pipe(rename({suffix: '.min'}))
      .pipe(cleanCSS('level: 2'))
      .pipe(gulp.dest('assets/css'))
      // Be very careful with purge css
      .pipe(purgecss({
        content: ['../**/*.php'],
      }))
      .pipe(gulp.dest('assets/css'))
      // ---------------
      .pipe(browserSync.stream())
      .pipe(notify({ message: 'Styles task complete' }));
  });

gulp.task('styles', gulp.series('compile-styles', 'process-styles'));

gulp.task('dev', function() {
    browserSync.init({
        proxy: "localhost/tesla"
    });
    // Watch .scss files
    gulp.watch(['./**/*.scss', '!./node_modules/', '!./.git/'], gulp.series('compile-styles', 'process-styles'));
    gulp.watch(['./**/*.*', '!./node_modules/', '!./.git/', '!./**/*.scss', '!./assets/css/theme.css', '!./assets/css/theme.min.css']).on('change', browserSync.reload);
});

gulp.task('watch', function() {
      // Watch .scss files
      gulp.watch(['./**/*.scss', '!./node_modules/', '!./.git/'], gulp.series('compile-styles', 'process-styles'));
});
