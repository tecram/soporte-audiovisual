var gulp = require('gulp'),
	nunjucksRender = require('gulp-nunjucks-render'),
	postcss = require('gulp-postcss'),
	reporter = require('postcss-reporter'),
	scss = require("postcss-scss"),
	stylelint = require('stylelint'),
	uglify = require('gulp-uglify');
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	cssnano = require('gulp-cssnano'),
	del = require('del'),
	imagemin = require('gulp-imagemin'),
	eslint = require('gulp-eslint');
	runSequence = require('run-sequence'),
    browserSync = require('browser-sync'),
    gutil = require('gulp-util'),
    projectName = 'audiovisual';


gulp.task('nunjucks', function() {
	return gulp.src('../html/pages/**/*.+(html|nunjucks)')
	.pipe(nunjucksRender({
		path: ['../html/templates/']
	}))
	.pipe(gulp.dest('../html'));
});

gulp.task('lint:css', function() {
	return gulp.src([
		'../html/stylesheets/**/*.+(css|scss)',
		'!../html/stylesheets/libs/*.+(css|scss)'
	])
	.pipe(postcss(
		[
			stylelint({
				"rules": {
					"color-hex-case": "lower",
					"color-hex-length": "short",
					"color-named": "never",
					"color-no-invalid-hex": true,
					"font-family-name-quotes": "always-unless-keyword",
					"function-calc-no-unspaced-operator": true,
					"function-comma-space-after": "never",
					"function-comma-space-before": "never",
					"function-linear-gradient-no-nonstandard-direction": true,
					"function-max-empty-lines": 0,
					"function-name-case": "lower",
					"function-url-no-scheme-relative": true,
					"function-url-quotes": "always",
					"function-whitespace-after": "always",
					"number-leading-zero": "never",
					"number-max-precision": 2,
					"number-no-trailing-zeros": true,
					"string-no-newline": true,
					"string-quotes": 'single',
					"length-zero-no-unit": true,
					"unit-case": "lower",
					"unit-no-unknown": true,
					"value-keyword-case": "lower",
					"value-no-vendor-prefix": true,
					"value-list-comma-space-after": "never",
					"value-list-comma-space-before": "never",
					"value-list-max-empty-lines": 0,
					"shorthand-property-no-redundant-values": true,
					"property-case": "lower",
					"property-no-unknown": true,
					"property-no-vendor-prefix": true,
					"keyframe-declaration-no-important": true,
					"declaration-bang-space-after": "never",
					"declaration-bang-space-before": "always",
					"declaration-colon-newline-after": "always-multi-line",
					"declaration-colon-space-after": "always",
					"declaration-colon-space-before": "never",
					"declaration-empty-line-before": "never",
					"declaration-no-important": true,
					"declaration-block-no-duplicate-properties": true,
					"declaration-block-no-redundant-longhand-properties": true,
					"declaration-block-no-shorthand-property-overrides": true,
					"declaration-block-semicolon-newline-after": "always",
					"declaration-block-semicolon-newline-before": "never-multi-line",
					//"declaration-block-semicolon-space-after": "always",
					"declaration-block-semicolon-space-before": "never",
					"declaration-block-single-line-max-declarations": 1,
					"declaration-block-trailing-semicolon": "always",
					"block-closing-brace-empty-line-before": "never",
					"block-closing-brace-newline-after": "always",
					"block-no-empty": true,
					//"block-opening-brace-space-after": "always",
					"block-opening-brace-space-before": "always",
					"selector-attribute-brackets-space-inside": "never",
					"selector-attribute-operator-space-after": "never",
					"selector-attribute-operator-space-before": "never",
					"selector-attribute-quotes": "always",
					"selector-combinator-space-after": "always",
					"selector-combinator-space-before": "always",
					"selector-descendant-combinator-no-non-space": true,
					"selector-max-compound-selectors": 3,
					"selector-no-attribute": true,
					"selector-no-vendor-prefix": true,
					"selector-pseudo-class-case": "lower",
					"selector-pseudo-class-no-unknown": true,
					"selector-pseudo-class-parentheses-space-inside": "never",
					"selector-pseudo-element-case": "lower",
					"selector-pseudo-element-colon-notation": "single",
					"selector-pseudo-element-no-unknown": true,
					"selector-type-case": "lower",
					"selector-type-no-unknown": true,
					"selector-max-empty-lines": 0,
					"selector-list-comma-newline-after": "always",
					"selector-list-comma-newline-before": "never-multi-line",
					"selector-list-comma-space-after": "always",
					"selector-list-comma-space-before": "never",
					// "rule-nested-empty-line-before": "never",
					"media-feature-colon-space-after": "always",
					"media-feature-colon-space-before": "never",
					"media-feature-name-case": "lower",
					"media-feature-name-no-unknown": true,
					"media-feature-name-no-vendor-prefix": true,
					"media-feature-parentheses-space-inside": "never",
					"media-feature-range-operator-space-after": "always",
					"media-feature-range-operator-space-before": "always",
					"media-query-list-comma-space-after": "always",
					"media-query-list-comma-space-before": "never",
					// "at-rule-empty-line-before": "always",
					"at-rule-name-case": "lower",
					"at-rule-name-space-after": "always",
					// "at-rule-no-unknown": true,
					"at-rule-no-vendor-prefix": true,
					"at-rule-semicolon-newline-after": "always",
					"comment-empty-line-before": "always",
					"comment-no-empty": true,
					"comment-whitespace-inside": "always",
					"indentation": "tab",
					"max-empty-lines": 2,
					"max-nesting-depth": 3,
					// "no-browser-hacks": true,
					"no-duplicate-selectors": true,
					"no-eol-whitespace": true,
					"no-extra-semicolons": true,
					"no-unknown-animations": true
				}
			}),
			reporter({
				clearMessages: true,
				// throwError: true
			})
		],
		{ syntax: scss }
	));
});

gulp.task('vendors:css', function() {
	return gulp.src([
		'../html/stylesheets/libs/**/*.+(css|scss)'
	])
	.pipe(concat('vendors.css'))
	.pipe(sass())
	.pipe(cssnano())
	.pipe(gulp.dest('../html/assets/css'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/css'));
});

gulp.task('build:css', function() {
	return gulp.src([
		'../html/stylesheets/utils/*.+(css|scss)',
		'../html/stylesheets/layouts/*.+(css|scss)',
		'../html/stylesheets/components/*.+(css|scss)',
		'../html/stylesheets/pages/*.+(css|scss)'
	])
	.pipe(sourcemaps.init())
	.pipe(autoprefixer({
		browsers: ['last 2 versions']
	}))
	.pipe(concat('main.min.css'))
	.pipe(sass())
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('../html/assets/css'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/css'));;
});

gulp.task('compress:css', function() {
	return gulp.src([
		'../html/stylesheets/libs/*.+(css|scss)',
		'../html/stylesheets/utils/*.+(css|scss)',
		'../html/stylesheets/layouts/*.+(css|scss)',
		'../html/stylesheets/components/*.+(css|scss)',
		'../html/stylesheets/pages/*.+(css|scss)'
	])
	.pipe(concat('main.min.css'))
	.pipe(sass())
	.pipe(cssnano())
	.pipe(gulp.dest('../html/assets/css'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/css'));
});

gulp.task('compress:img', function() {
	return gulp.src('../html/images/**/*')
		.pipe(imagemin())
		.pipe(gulp.dest('../html/assets/images'))
		.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/images'));
});

gulp.task('clean', function(cb) {
	del.sync([
		'../html/assets',
		'../html/*.+(html|php)',
		'../cms/wp-content/themes/'+ projectName +'/assets'
	], {force: true}, cb);
});

gulp.task('vendors:js', function() {
	return gulp.src([
		'../html/javascripts/libs/jquery/jquery-1.12.3.min.js',
		'../html/javascripts/libs/*.js'
	])
	.pipe(concat('vendors.js'))
	.pipe(uglify())
	.pipe(gulp.dest('../html/assets/js/'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/js'));
});

gulp.task('js:lint', function () {
    return gulp.src(['../html/javascripts/*.js'])
        .pipe(eslint({
          rules:{
            "camelcase": 2,
            "no-mixed-spaces-and-tabs": 0,
            "default-case": 2,
            "eqeqeq": 2,
            "no-empty-function": 2,
            "no-multi-spaces": 2,
            "strict": 2,
            "block-spacing": 2,
            "comma-spacing": ["error", {"before": false, "after": true}],
            "indent": ["error", "tab", {"SwitchCase": 1}],
            "no-multiple-empty-lines": ["error", {"max": 1}],
            "no-inline-comments": "error",
            "one-var-declaration-per-line": ["error", "always"],
            "no-console": 1
          }
        }))
        .pipe(eslint.results(results => {
	    	// Called once for all ESLint results. 
	        console.log(`Total Results: ${results.length}`);
	        console.log(`Total Warnings: ${results.warningCount}`);
	        console.log(`Total Errors: ${results.errorCount}`);
        }))
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
});

gulp.task('build:js', function() {
	return gulp.src([
		'../html/javascripts/*.js'
	])
	.pipe(sourcemaps.init())
    .pipe(concat('main.min.js'))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('../html/assets/js/'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/js'));
});

gulp.task('compress:js', function() {
	return gulp.src([
		'../html/javascripts/*.js'
	])
	.pipe(concat('main.min.js'))
	.pipe(uglify().on('error', gutil.log))
	.pipe(gulp.dest('../html/assets/js/'))
	.pipe(gulp.dest('../cms/wp-content/themes/'+ projectName +'/assets/js'));
});

gulp.task('watch', function() {
	browserSync.init({
		server: {
			baseDir: '../html'
		}
	});

	gulp.watch('../html/stylesheets/**/*', ['build'], browserSync.reload);
	gulp.watch('../html/stylesheets/**/*', ['compress:css'], browserSync.reload);
	gulp.watch('../html/javascripts/**/*', ['build'], browserSync.reload);
	gulp.watch('../html/javascripts/**/*', ['compress:js'], browserSync.reload);
	gulp.watch('../html/images/**/*', ['build'], browserSync.reload);
	gulp.watch('../html/*.html', browserSync.reload);
	gulp.watch('../html/modules/**/*', ['nunjucks'], browserSync.reload);
	gulp.watch('../html/templates/**/*', ['nunjucks'], browserSync.reload);
	gulp.watch('../html/pages/**/*', ['nunjucks'], browserSync.reload);
});


gulp.task('default', function(cb) {
	runSequence('nunjucks', ['lint:css', 'vendors:css', 'build:css', 'compress:img', 'vendors:js', 'js:lint', 'build:js', 'watch'], cb);
});

gulp.task('css', function(cb) {
	runSequence('nunjucks', ['lint:css', 'vendors:css', 'build:css'], cb);
});

gulp.task('js', function(cb) {
	runSequence('nunjucks', ['js:lint', 'vendors:js', 'build:js'], cb);
});

gulp.task('images', function(cb) {
	runSequence('nunjucks', ['compress:img'], cb);
});

gulp.task('build', function(cb) {
	runSequence('nunjucks', ['lint:css', 'vendors:css', 'build:css', 'compress:img', 'vendors:js', 'js:lint', 'build:js'], cb);
});

gulp.task('publish', function(cb) {
	runSequence('nunjucks', ['clean', 'lint:css', 'vendors:css', 'build:css', 'compress:css', 'compress:img', 'vendors:js', 'js:lint', 'build:js', 'compress:js'], cb);
});