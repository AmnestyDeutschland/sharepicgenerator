const ConcatPlugin = require('webpack-concat-plugin');
const isDevelopment = process.env.NODE_ENV === 'development';
const isProduction = process.env.NODE_ENV === 'production';

const tenant = new ConcatPlugin({
  uglify: isProduction,
  sourceMap: isDevelopment,
  name: 'result',
  outputPath: './js/',
  injectType: 'none',
  fileName: 'einigungshilfe.min.js',
  filesToConcat: ['./build/js/einigungshilfe/*.js'],
  attributes: {
    async: true,
  }
});

module.exports = { tenant };
