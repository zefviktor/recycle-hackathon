

const gulp         = require('gulp');
const browserSync  = require('browser-sync').create();
const sass         = require('gulp-sass');
const clean        = require('gulp-clean');
const autoprefixer = require('gulp-autoprefixer');
const concatCss    = require('gulp-concat-css');
const cleanCSS     = require('gulp-clean-css');
const rename       = require("gulp-rename");
const uglify       = require('gulp-uglify');
const sourcemaps   = require('gulp-sourcemaps');
const tap          = require('gulp-tap');
const header       = require('gulp-header');
const footer       = require('gulp-footer');
const file         = require('gulp-file');





gulp.task('directories', function () {
    return gulp.src('*.*', {read: false})
        .pipe(gulp.dest('assets/css'))
        .pipe(gulp.dest('assets/fonts'))
        .pipe(gulp.dest('assets/img'))
        .pipe(gulp.dest('assets/js'))
        .pipe(gulp.dest('assets/sass'))
});





//
// gulp.task('add-text-to-end', function() {
//     return gulp.src('.gitignore')
//         .pipe(footer('1111111111111111, dfdfgdfgdfg'))
//         .pipe(gulp.dest(''));
// });



gulp.task('clean', function () {
    return gulp.src(['css', 'fonts', 'img'], {read: false})
        .pipe(clean());
});




gulp.task('php', function () {
    return gulp.src('**/*.php')
        .pipe(browserSync.reload({stream: true}))
});


gulp.task('sass', function () {
    return gulp.src('assets/sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            // browsers: ['> 0.1%'],
            cascade: false
        }))
        // .pipe(concatCss("style2.css"))
        .pipe(rename({suffix: ".min"}))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.reload({stream: true}));
});


gulp.task('fonts', function () {
    return gulp.src('assets/fonts/**/*')
        .pipe(gulp.dest('fonts'))
        .pipe(browserSync.reload({stream: true}))
});

gulp.task('img', function () {
    return gulp.src('assets/img/**/*.*')
        .pipe(gulp.dest('img'))
        .pipe(browserSync.reload({stream: true}))
});


gulp.task('min',['mincss', 'minjs']);

gulp.task('mincss', function() {
    return gulp.src("assets/css/*.css")
        .pipe(rename({suffix: ".min"}))
        .pipe(cleanCSS())
        .pipe(gulp.dest("css"))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('minjs', function() {
    return gulp.src("assets/js/*.js")
        .pipe(rename({suffix: ".min"}))
        .pipe(uglify())
        .pipe(gulp.dest("js"))
        .pipe(browserSync.reload({stream: true}));
});



gulp.task("watch", ['php', 'img', 'sass', 'min', 'fonts'], function () {
    browserSync.init({
        proxy: "localhost/recycle-hackathon",
        port: 8000,
        // tunnel: true
    });
    // browserSync.init({
    //     server: "./akad",
    //     notify: false,
    //     ui: {
    //         port: 3000
    //     },
    //     // tunnel: true
    // });
    gulp.watch('**/*.php', ["php"]);
    gulp.watch('assets/sass/**/*.sass', ["sass"]);
    gulp.watch('assets/js/**/*.js', ["minjs"]);
    gulp.watch('assets/css/**/*.css', ["mincss"]);
    gulp.watch('assets/img/**/*.*', ["img"]);
    gulp.watch('assets/fonts/**/*', ["form"])
    // gulp.watch("src/*.html").on('change', browserSync.reload);
});
