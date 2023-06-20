const path = require("path");
const mode = process.env.NODE_ENV;
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const glob = require("glob");

module.exports = {
    mode: mode,
    entry: glob.sync('./{assets,blocks}/**/main.js').reduce((acc, path) => {
        /**
         * The "[name]" placeholder in the "output" property will be replaced
         * with each key name in our "entry" object. We need to make sure the
         * keys are a path to the "index.js" file but without the actual file
         * name. This is why we replace the file name, "index.js", with a string
         */
        const entry = path.replace('/index.js', '')
        /**
         * Here we start building our object by placing the "entry" variable from
         * the previous line as a key and the entire path including the file name
         * as the value
         */
        acc[entry] = path
        return acc
    }, {}),
module: {
    rules: [
        {
            test: /\.(js|jsx)$/,
            use: {
                loader: 'babel-loader'
            },
            exclude: /node_modules/,
            include: path.join(__dirname, 'src')
    },
        {
            test: /\.css$/,
            use: ["style-loader", "css-loader"],
    },
        {
            test: /\.scss$/,
            use: [ MiniCssExtractPlugin.loader, "css-loader", "postcss-loader", "sass-loader", "import-glob-loader"]
    },
        {
            test: /\.(png|jpe?g|gif|jp2|webp)$/,
            loader: 'file-loader',
            options: {
                name: '[name].[ext]'
            }
    },
    ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name]/style.css",
            chunkFilename: "[name]/style.css"
        })
    ],
output: {
    filename: './[name]/main.js',
    path: path.resolve(__dirname) + '/dist/'
    },
    externals: {
        jquery: 'jQuery'
    }
}