module.exports = {
    plugins: [
        require("precss"),
        require("postcss-normalize"),
        require("autoprefixer"),
        require("cssnano")({
            preset: "default"
        })
    ]
};