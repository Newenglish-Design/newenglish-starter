const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const webpack = require('webpack');
const THEME_NAME = 'newenglish-starter';

module.exports = {
    entry: { 'assets': './assets/assets.dev.js' },
    output: { path: path.resolve(__dirname, 'dist'), filename: '[name].js', publicPath: `/wp-content/themes/${THEME_NAME}/dist/`, },
    resolve: {
        extensions: ['.js', '.jsx', '.ts', '.tsx']
    },
    mode: 'production',
    plugins: [
        new CleanWebpackPlugin({cleanAfterEveryBuildPatterns: ['!*.png', '!*.svg', '!*.jpg']}),
        new MiniCssExtractPlugin({ filename: '[name].css', hunkFilename: "[id].css" }),
        new webpack.HotModuleReplacementPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader", // ESNext
                }
            },
            {
                test: /\.tsx?$/,
                loader: 'ts-loader', // Typescript!
                exclude: /node_modules/,
            },
            {
                test: /\.s[ac]ss$/i,
                exclude: /node_modules/,
                use: [
                    { loader: MiniCssExtractPlugin.loader, options: {hmr: true } },
                    { loader: 'css-loader', options: { importLoaders: 1 }},
                    'sass-loader',
                ]
            },
            {
                test: /\.(png|svg|jpg|gif|eot|woff|woff2|otf|ttf)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                    },
                }]
            }
        ]
    },
}