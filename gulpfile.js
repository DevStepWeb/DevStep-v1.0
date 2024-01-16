const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const gulpSass = require("gulp-sass");
const nodeSass = require("node-sass");
const sass = gulpSass(nodeSass);
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");

function minSass() {
  return gulp
    .src("./assets/scss/**/*.scss")
    .pipe(
      sass({
        outputStyle: "compressed",
      })
    )
    .pipe(
      autoprefixer({
        cascade: true,
      })
    )
    .pipe(concat("style.css"))
    .pipe(gulp.dest("assets/css/"))
    .pipe(browserSync.stream());
}
gulp.task("minsass", minSass);

function pluginJS() {
  return gulp
    .src([
      "libs/swiperjs/swiper.min.js", 
      "libs/jquery/jquery.min.js", 
      "libs/aos/aos.js", 
      "libs/parallax/parallax.min.js", 
      "libs/parallax/simpleParallax.min.js"
    ])
    .pipe(concat("libs.js"))
    .pipe(gulp.dest("assets/js/"))
    .pipe(browserSync.stream());
}
gulp.task("libsjs", pluginJS);


function pluginCSS() {
  return gulp
    .src([
      "libs/swiperjs/swiper.min.css",  
      "libs/aos/aos.css", 
    ])
    .pipe(concat('libs.css'))
    .pipe(gulp.dest('assets/css/'))
    .pipe(browserSync.stream());
}
gulp.task('libscss', pluginCSS);

function minJS() {
  return gulp
    .src(["./assets/js/main.js"])
    .pipe(concat("all.min.js"))
    .pipe(gulp.dest("assets/js/"))
    .pipe(browserSync.stream());
}
gulp.task("minjs", minJS);

function watch() {
  gulp.watch("./assets/scss/*.scss", minSass);
  gulp.watch("assets/js/*.js", minJS);
  gulp.watch(["*.html"]).on("change", browserSync.reload);
}
gulp.task("watch", watch);

gulp.task(
  "default",
  gulp.parallel("watch", "libsjs", "libscss", "minjs", "minsass")
);