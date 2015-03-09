var gulp = require('gulp'),
    less = require('gulp-less'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    growl = require('gulp-notify-growl'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    phpunit = require('gulp-phpunit');

var paths = {
    'dev': {
        'less': './resources/assets/less/',
        'img': './resources/assets/img/',
        'js': './resources/assets/js/',
        'vendor': './resources/assets/vendor/'
    },
    'production': {
        'img': './public/assets/img/',
        'css': './public/assets/css/',
        'js': './public/assets/js/'
    }
};

// CSS
gulp.task('css', function () {
    return gulp.src(paths.dev.less + 'app.less')
        .pipe(less())
        .pipe(gulp.dest(paths.production.css))
        .pipe(minify({keepSpecialComments: 0}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(paths.production.css));
});

// JS
gulp.task('js', function () {
    return gulp.src([
        paths.dev.vendor + 'jquery/dist/jquery.js',
        paths.dev.vendor + 'bootstrap/dist/js/bootstrap.js',
        paths.dev.vendor + 'iCheck/icheck.js',
        paths.dev.js + '**/*.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.production.js));
});

gulp.task('images', function () {
    return gulp.src(paths.dev.img + '**/*')
        .pipe(imagemin({
            optimizationLevel: 5,
            progressive: true,
            interlaced: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(paths.production.img));
});

gulp.task('watch', function () {
    gulp.watch(paths.dev.less + '/**/*.less', ['css']);
    gulp.watch(paths.dev.js + '/**/*.js', ['js']);
    gulp.watch(paths.dev.img + '/**/*', ['img']);
});

gulp.task('default', ['css', 'js', 'images', 'watch']);
