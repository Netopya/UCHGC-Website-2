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
    // Handle path prefix properly
    const pathPrefix = "/UCHGC-Website-2";
    
    // If URL already has path prefix, replace the language part
    if (url.startsWith(pathPrefix)) {
      return url.replace(`${pathPrefix}/${currentLang}/`, `${pathPrefix}/${lang}/`);
    }
    
    // If URL doesn't have path prefix, add it and construct the new URL
    if (url.startsWith(`/${currentLang}/`)) {
      return `${pathPrefix}${url.replace(`/${currentLang}/`, `/${lang}/`)}`;
    }
    
    // Fallback: construct URL from scratch
    return `${pathPrefix}/${lang}/`;
  });
  
  // Dynamic schedule filter
  eleventyConfig.addFilter("dynamicSchedule", function(lang) {
    const now = new Date();
    const months = [];
    
    // Month names in different languages
    const monthNames = {
      en: ['January', 'February', 'March', 'April', 'May', 'June', 
           'July', 'August', 'September', 'October', 'November', 'December'],
      fr: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
           'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
      uk: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень',
           'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень']
    };
    
    // Intro text in different languages
    const introText = {
      en: 'Sunday Worship is held at 9:00am or 11:00am depending on the month. The schedule for the next 3 months is as follows:',
      fr: 'Les messes dominicales auront lieu soie à 9h ou 11h dependant du mois. L\'horaire pour les prochains 3 mois est le suivant:',
      uk: 'Кожного місяця нелільні і святкові Богослужби будуть починатвися почергово О 9 або 11 годині:'
    };
    
    // Time formatting by language
    const timeFormat = {
      en: { early: '9:00am', late: '11:00am' },
      fr: { early: '9h00', late: '11h00' },
      uk: { early: '9 година', late: '11 година' }
    };
    
    // Generate next 3 months (including current)
    for (let i = 0; i < 3; i++) {
      const date = new Date(now.getFullYear(), now.getMonth() + i, 1);
      const monthNumber = date.getMonth() + 1; // 1-based month
      const monthName = monthNames[lang][date.getMonth()];
      const time = (monthNumber % 2 === 1) ? timeFormat[lang].early : timeFormat[lang].late; // Odd = 9am, Even = 11am
      
      months.push(`<li>${monthName}: ${time}</li>`);
    }
    
    return `<p class="lead">${introText[lang]}</p><ul class="text-start d-inline-block">${months.join('')}</ul>`;
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