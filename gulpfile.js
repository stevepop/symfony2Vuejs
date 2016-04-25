// Pull in dependencies
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    less = require('gulp-less'),
    source = require('vinyl-source-stream'),
    path = require('path'),
    concatCss = require('gulp-concat-css'),
    browserify = require('browserify'),
    vueify = require('vueify'),
    lessdir = 'src/less',
    notify = require("gulp-notify");

gulp.task('default',['watch']);

// Watches .less files and compiles them to CSS in realtime
gulp.task('watch', function() {
    // Watch .less files
    gulp.watch('src/less/*.less', ['less']);
    gulp.watch('src/js/*.js', ['js']);
});

gulp.task('less', function () {
    return gulp.src(
        [
            lessdir + '/*.less'
        ], {base: lessdir})
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(concatCss("styles.css"))
        .pipe(gulp.dest('web/css'));
});

gulp.task('js', function () {
    browserify('./src/js/app.js')
        .bundle()
        .on('error', function(e){
            gutil.log(e);
        })
        .pipe(source('bundle.js'))
        .pipe(gulp.dest('./web/js/'))
});
