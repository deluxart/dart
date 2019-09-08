/* eslint-disable camelcase */
const {
  dest,
  parallel,
  series,
  src
} = require('gulp'),
  concat = require('gulp-concat'),
  // del = require("del"),
  // plumber = require('gulp-plumber'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  // purge = require('gulp-css-purge'),
  cleanCSS = require('gulp-clean-css');


const Wlax = {
  // all: [
  //   './*.*',
  //   // './fonts/*.*',
  //   // './img/**/*.*',
  //   // '!./**/*.scss',
  //   '!./*.scss',
  //   '!./css/*.css',
  //   '!./**/*.js'
  // ],
  scss: './assets/scss/*.scss',
  aljs: [
    './js/*.js'
  ],
  pub: './dist/',
  css: './dist',
  newcss: './css/',
  allcss: './css/*.css',
  js: './dist'
}

// const clear = () => src('./dist', {read: false}).pipe(gcln());
// const clear = () => del(Wlax.pub).then((paths) => {
//   console.log('Deleted files and folders:\n', paths.join('\n'));
// });

// const allf = () => src(Wlax.all, { base: './'}).
// pipe(dest(Wlax.pub));

const css = () => src(Wlax.scss).
  // pipe(concat('min')).
  pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError)).
  // pipe(rename('*.min.css')).
  pipe(dest(Wlax.newcss));

// Объединение стилей CSS
const allcss = () => src(Wlax.allcss).
  pipe(concat('min')).
  pipe(cleanCSS({compatibility: 'ie8'})).
  // pipe(plumber()).
  pipe(rename('styles-all.min.css')).
  pipe(dest(Wlax.css));
// Объединение стилей CSS


// const js = () => src(Wlax.aljs).
//   pipe(concat('min')).
//   pipe(rename('scripts-all.min.js')).
//   pipe(dest(Wlax.js));


// exports.clean = clear;
exports.styles = css;
exports.mstyles = allcss;
// exports.scripts = js;
// exports.all = allf;

exports.build = series(parallel(css, allcss));
exports.default = series(parallel(css, allcss));

