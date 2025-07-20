<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Settings
     |--------------------------------------------------------------------------
     |
     | The DomPDF settings. More info at: https://github.com/dompdf/dompdf
     |
     */
    'show_warnings' => false,   // Supress warnings
    'orientation' => 'portrait',
    'defines' => [
        /**
         * The location of the DOMPDF font directory
         *
         * The location of the directory where DOMPDF will store fonts and font metrics
         * Note: This directory must exist and be writable by the webserver process.
         * *Please note the trailing slash.*
         *
         * Notes regarding fonts:
         * Additional .afm font metrics can be added by executing `php dompdf/load_font.php`
         * Both .ttf and .otf fonts are supported. AFM fonts are included.
         * To use a Unicode font (such as Arial Unicode MS), you must have the TTFb version of the font
         * installed and you must reference the font in the dompdf configuration file:
         *     $fontDir = realpath(DOMPDF_DIR . '/lib/fonts');
         *     $fontCache = realpath(DOMPDF_DIR . '/lib/fonts');
         *     $fontMetrics = realpath(DOMPDF_DIR . '/lib/fonts');
         *     $unicodeFont = true;
         * Additionally, you can set the `$unicode_font` configuration option:
         *     'unicode_font' => true,
         *
         * @var string
         */
        'font_dir' => storage_path('fonts/'), // advised by dompdf (https://github.com/dompdf/dompdf/pull/782)

        /**
         * The location of the DOMPDF font cache directory
         *
         * This directory contains the cached font metrics for the fonts used by DOMPDF.
         * This directory can be the same as DOMPDF_FONT_DIR
         *
         * @var string
         */
        'font_cache' => storage_path('fonts/'),

        /**
         * The location of a temporary directory.
         *
         * The directory specified must be writeable by the webserver process.
         * The temporary directory is required to download remote images and when
         * using the PFD rendering debug option.
         *
         * NOTE: if TEMP_DIR is commented out (or set to null) the default system
         * temporary directory will be used.
         *
         * @var string
         */
        'temp_dir' => storage_path('fonts/'),

        /**
         * ==== IMPORTANT ====
         *
         * dompdf's "chroot" is the base directory that dompdf will reference
         * when seeking to read any external media files.
         *
         * The "chroot" can be in one of two locations:
         * 1. The default (recommended):
         *    the `dompdf` directory inside the laravel storage path
         * 2. Anywhere else on your filesystem provided that the `sys_get_temp_dir()` has permissions
         *    to access this directory. This will not work in shared hosting environments
         *
         * To customize the `chroot`, you must specify the value in the `.env` file like so:
         *    DOMPDF_CHROOT=/path/to/directory
         *
         * @var string
         */
        'chroot' => base_path(),

        /**
         * Whether to enable font subsetting or not.
         *
         * Default to false, will extract the minimum necessary glyphs from Unicode fonts.
         *
         * @var bool
         */
        'font_subset' => false,

        /**
         * Enable PDF/A-1b support (experimental)
         *
         * Default to false
         *
         * @var bool
         */
        'pdfa' => false,

        /**
         * Enable inline CSS file support
         *
         * @var bool
         */
        'inline_css' => true,

        /**
         * Enable inline JS file support
         *
         * @var bool
         */
        'inline_js' => false,
    ],
];
