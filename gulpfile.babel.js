import autoprefixer from "autoprefixer";
import browserSync from "browser-sync";
import { spawn } from "child_process";
import cssnano from "cssnano";
import { dest, series, src, task, watch } from "gulp";
import gulpif from "gulp-if";
import postcss from "gulp-postcss";
import purgecss from "gulp-purgecss";
import sourcemaps from "gulp-sourcemaps";
import atimport from "postcss-import";
import tailwindcss from "tailwindcss";
import notify from "gulp-notify";
import concat from "gulp-concat";
import uglify from "gulp-uglify";
import order from "gulp-order";
import util from "gulp-util";
import print from "gulp-print";

const rawStylesheet = "./assets/css/style.css";
const siteRoot = ".";
const cssRoot = `${siteRoot}/css/`;
const tailwindConfig = "./assets/css/tailwind.js";

const devBuild =
  (process.env.NODE_ENV || "development").trim().toLowerCase() ===
  "development";


class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-z0-9-:\/]+/g) || [];
  }
}


//Tailwind Js/Css
task("processStyles", done => {
  browserSync.notify("Compiling styles...");

  return src(rawStylesheet)
    .pipe(postcss([atimport(), tailwindcss(tailwindConfig)]))
    .pipe(gulpif(devBuild, sourcemaps.init()))
    .pipe(
      gulpif(
        !devBuild,
        new purgecss({
          content: ["./**/*.html"],
          extractors: [
            {
              extractor: TailwindExtractor,
              extensions: ["html", "js"]
            }
          ]
        })
      )
    )
    .pipe(gulpif(!devBuild, postcss([autoprefixer(), cssnano()])))
    .pipe(gulpif(devBuild, sourcemaps.write("")))
    .pipe(dest(cssRoot));
});


//JS Files
  task("uglify", function() {
    var jsFiles = ['assets/js/**/*.js'];

     src(jsFiles)
     .pipe(order([
      '*',
      'scripts.js'
      ]))
    .pipe(concat('main.js'))
    .pipe(uglify().on('error', util.log))
    .pipe(dest('./js'))
    return src('package.json')
    .pipe(print(function() { return 'Server Started'; }));
  });


task("startServer", () => {
  browserSync.init({
    files: [siteRoot],
    proxy: "local.test",
    open: "local",
    port: 5000,
  });

  watch(
    [
      'assets/css/**/*.css',
      'assets/css/**/*.js',
    ],
    { interval: 500 },
    buildSite
  );

  watch(
    [
      'assets/js/**/*.js',
    ],
    { interval: 500 },
    pipejs
  );

});

const buildSite = series("processStyles");
const pipejs = series("uglify");

exports.serve = series(buildSite, "startServer");
exports.default = series(buildSite, pipejs);
