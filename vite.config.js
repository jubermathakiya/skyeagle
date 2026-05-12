import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import { viteStaticCopy } from 'vite-plugin-static-copy'
export default defineConfig({
    build: {
        outDir: 'public/build/',
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (css) => {
                    if (css.name.split('.').pop() == 'css') {
                        return 'css/' + `[name]` + '.min.' + 'css';
                    } else {
                        return 'icons/' + css.name;
                    }
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/style.css', 
                'resources/js/script.js',
                
                //custom js
                'resources/js/common/form-handler.js',

                //Enquiry js
                'resources/js/enquiry/create.js',

                //Contact js
                'resources/js/contact/create.js',

                //Auth js
                'resources/js/auth/auth.js',

                //Wishlist js
                'resources/js/wishlist/wishlist.js',

                //Package js 
                'resources/js/package/index.js',
            ],
            refresh: true,
        }),

        viteStaticCopy({
            targets: [
                {
                    src: 'resources/css',
                    dest: ''
                },
                {
                    src: 'resources/scss',
                    dest: ''
                },
                {
                    src: 'resources/fonts',
                    dest: ''
                },
                {
                    src: 'resources/img',
                    dest: ''
                },
                {
                    src: 'resources/js',
                    dest: ''
                },
               
                {
                    src: 'resources/plugins',
                    dest: ''
                },
               
            ]
        }),
    ],
});
