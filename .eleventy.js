module.exports = function(eleventyConfig) {
  // Copy static assets
  eleventyConfig.addPassthroughCopy("src/assets");
  eleventyConfig.addPassthroughCopy("src/css");
  eleventyConfig.addPassthroughCopy("src/js");
  eleventyConfig.addPassthroughCopy("src/images");
  eleventyConfig.addPassthroughCopy("src/documents");
  
  // Watch for changes
  eleventyConfig.addWatchTarget("src/css/");
  eleventyConfig.addWatchTarget("src/js/");
  
  // Collections for each language
  eleventyConfig.addCollection("posts_en", function(collectionApi) {
    return collectionApi.getFilteredByGlob("src/en/posts/*.md");
  });
  
  eleventyConfig.addCollection("posts_fr", function(collectionApi) {
    return collectionApi.getFilteredByGlob("src/fr/posts/*.md");
  });
  
  eleventyConfig.addCollection("posts_uk", function(collectionApi) {
    return collectionApi.getFilteredByGlob("src/uk/posts/*.md");
  });
  
  // Language navigation filter
  eleventyConfig.addFilter("langUrl", function(url, lang, currentLang) {
    if (lang === currentLang) return url;
    return url.replace(`/${currentLang}/`, `/${lang}/`);
  });
  
  // Date filter
  eleventyConfig.addFilter("dateFormat", function(date, locale = "en-US") {
    return new Intl.DateTimeFormat(locale).format(date);
  });

  return {
    dir: {
      input: "src",
      output: "_site",
      includes: "_includes",
      layouts: "_layouts",
      data: "_data"
    },
    templateFormats: ["md", "njk", "html"],
    markdownTemplateEngine: "njk",
    htmlTemplateEngine: "njk",
    dataTemplateEngine: "njk",
    pathPrefix: "/UCHGC-Website-2/"
  };
}; 