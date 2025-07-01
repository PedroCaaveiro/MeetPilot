const { src, dest, watch, parallel } = require('gulp');

// CSS
const sassPackage = require('sass');
const gulpSass = require('gulp-sass');
const sass = gulpSass(sassPackage);

const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

// Imagenes
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
let webp; // no require aquí
const avif = require('gulp-avif');

// Javascript
const terser = require('gulp-terser-js');
const concat = require('gulp-concat');
const rename = require('gulp-rename');

// Webpack

const webpack = require ('webpack-stream')

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
}

function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'expanded' }))
        // .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/css'));
}

function javascript() {
    return src(paths.js)
    .pipe(webpack({
        module:{
            rules:[
                {
                    test:/\.css$/i,
                    use:['style-loader','css-loader']
                }
            ]
        },
        mode:'production',
        watch:true,
        entry:'./src/js/app.js'
    }))
        .pipe(sourcemaps.init())
      //  .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('./public/build/js'));
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest('public/build/img'));
}

// Función para cargar gulp-webp dinámicamente
async function cargarWebp() {
    if (!webp) {
        webp = (await import('gulp-webp')).default;
    }
}

async function versionWebp(done) {
    await cargarWebp();
    const opciones = {
        quality: 50
    };
    return src('src/img/**/*.{png,jpg}')
        .pipe(webp(opciones))
        .pipe(dest('public/build/img'));
    done();
}

function versionAvif(done) {
    const opciones = {
        quality: 50
    };
    src('src/img/**/*.{png,jpg}')
        .pipe(avif(opciones))
        .pipe(dest('public/build/img'));
    done();
}

function dev(done) {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
    watch(paths.imagenes, versionWebp);
    watch(paths.imagenes, versionAvif);
    done();
}

exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.dev = parallel(css, imagenes, versionWebp, versionAvif, javascript, dev);
exports.default = exports.dev;
