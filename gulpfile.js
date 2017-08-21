'use strict';
const del = require('del');
const browserify = require('browserify');
const gulp = require('gulp');
const rename = require("gulp-rename");
const sass = require('gulp-sass');
const babelify = require('babelify');
const uglify = require('gulp-uglify');
const source = require("vinyl-source-stream");
const buffer = require('vinyl-buffer');
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const autoprefixer = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');
const htmlmin = require('gulp-htmlmin');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const envify = require('envify');
const sourcemaps = require('gulp-sourcemaps');
const gulpCopy = require('gulp-copy');


gulp.task('styles', function () {
  return gulp.src('./app/styles/**/*.scss')
    .pipe(plumber())
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer({browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']}))
    .pipe(cleanCSS({
      level: {
        1: {
          specialComments: 0
        }
      }
    }))
    .pipe(gulp.dest('./dist/styles'))
    .pipe(browserSync.reload({ stream:true }));
});


gulp.task("js", function () {
  // set up the browserify instance on a task basis
    return browserify({
      entries: './app/scripts/main.js',
      transform: [envify, babelify],
      //debug: true
    })
    .bundle()
    .pipe(source("./app/scripts/main.js"))
    .pipe(plumber())
    .pipe(rename('main.js'))
    .pipe(buffer())
    /*.pipe(uglify({
      mangle: false,
      compress: {
        //sequences: true,
        //dead_code: true,
        //conditionals: true,
        //booleans: true,
        //unused: true,
        //if_return: true,
        //join_vars: true
        //drop_console: true 
      }
    }))*/
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./dist/scripts"))
    .pipe(browserSync.reload({ stream:true }));
});

gulp.task('html', function () {
  return gulp.src('app/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('dist'))
    .pipe(browserSync.reload({ stream:true }));
});




gulp.task('images', () => {
  return gulp.src('./app/images/**/*')
    .pipe(cache(imagemin({
      progressive: true,
      interlaced: true,
      optimizationLevel: 5,
      svgoPlugins: [{cleanupIDs: false}]
    })))
    .pipe(gulp.dest('./dist/images'))
    .pipe(browserSync.reload({ stream:true }));
});


gulp.task('fonts', () => {
    return gulp.src([
      './app/fonts/**/*'
    ])
    .pipe(gulp.dest('./dist/fonts'))
    .pipe(browserSync.reload({ stream:true }));
});



gulp.task('extras', () => {});


gulp.task('clean', del.bind(null, ['dist']));


gulp.task('set-dev-node-env', function() {
    return process.env.NODE_ENV = 'development';
});

gulp.task('set-prod-node-env', function() {
    return process.env.NODE_ENV = 'production';
});


gulp.task("serve", ['set-dev-node-env', 'html', "styles", "js", 'images', 'fonts', 'extras'], () => {
  browserSync.init({
    server: {
      baseDir: "./dist/"
      //https: true
    }
  });

  gulp.watch('./app/images/**/*', ['images']);
  gulp.watch('./app/fonts/**/*', ['fonts']);
  gulp.watch('./app/*.html', ['html']);
  gulp.watch('./app/scripts/**/*.js', ['js']);
  gulp.watch('./app/styles/**/*.scss', ['styles']);  
});

gulp.task('build', ['set-prod-node-env', 'html', 'styles', 'js', 'images', 'fonts', 'extras'], () => {
  //return gulp.src('dist/**/*').pipe($.size({title: 'build', gzip: true}));
});
gulp.task('default', ['clean'], () => {
  gulp.start('build');
});
