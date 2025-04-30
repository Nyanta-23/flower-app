import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import basicSsl from '@vitejs/plugin-basic-ssl'

// export default defineConfig({
//     plugins: [
//         laravel([
//             'resources/css/app.css',
//             'resources/js/app.js',
//         ]),
//     ],
//     server: {
//         host: '192.168.21.190',
//         port: 5173,
//         strictPort: true,
//         cors: true
//     },
// });

const host = '192.168.21.190';
const port = '5173';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        // basicSsl()
    ],
    server: {
        // https: true,
        // proxy: {
        //     '^(?!(\/\@vite|\/resources|\/node_modules))': {
        //         target: `http://${host}:${port}`,
        //     }
        // },
        host,
        port,
        hmr: { host },
    }
});

