var gulp = require('gulp');
var concat = require('gulp-concat');
var browserSync = require('browser-sync');
var prefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var notify = require('gulp-notify');

var pathOf = {
    project:{
        name:'dasan' 
    },
    css: {
        src: 'resources/assets/sass/*.scss',
        dest: 'public/css/'
    },
    js: {
        src: 'resources/assets/js/*.js',
        dest: 'public/js/'
    }
}

gulp.task('scripts', function () {
    //using gulp-concat
    return gulp.src(pathOf.js.src)
        .pipe(concat('all.js'))
        .on('error', notify.onError("Error:<%= error.message %>"))
        .pipe(gulp.dest(pathOf.js.dest))
})

gulp.task('sassy', function () {
    //using gulp-sass
    return gulp.src(pathOf.css.src)
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded',
            precision: 2,
            errLogToConsole: true
        }))
        .on('error', notify.onError("Error:<%= error.message %>"))
        .pipe(prefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(pathOf.css.dest))
})

gulp.task('watch', ['scripts', 'sassy'], function () {
    gulp.watch(pathOf.js.src, ["scripts"]);
    gulp.watch(pathOf.css.src, ["sassy"]);
});

gulp.task('default', ['watch']);
