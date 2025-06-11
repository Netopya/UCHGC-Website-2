# Ukrainian Catholic Holy Ghost Church - Static Site

This is the new static website for the Ukrainian Catholic Holy Ghost Church in Montreal, built with [Eleventy](https://www.11ty.dev/) and [Bootstrap 5](https://getbootstrap.com/).

## Migration Strategy

### Multi-language Support
The site supports three languages:
- **English** (`/en/`)
- **French** (`/fr/`)
- **Ukrainian** (`/uk/`)

#### Language Implementation
- **Directory-based routing**: Each language has its own directory
- **Shared translations**: Common text stored in `src/_data/translations.js`
- **Language switcher**: Maintains current page context when switching languages
- **SEO-friendly**: Each language version has proper `hreflang` attributes

### Architecture

```
src/
├── _data/           # Global data files
│   └── translations.js
├── _includes/       # Reusable components
├── _layouts/        # Layout templates
│   ├── base.njk     # Base HTML structure
│   ├── home.njk     # Home page layout
│   └── page.njk     # Content page layout
├── en/              # English content
├── fr/              # French content
├── uk/              # Ukrainian content
├── css/             # Stylesheets
├── js/              # JavaScript files
└── images/          # Static images
```

### Content Management

#### Static Content
- Main content stored in Markdown files with YAML front matter
- Layout templates handle presentation
- Translations managed centrally in data files

#### Migrated Content
The following content has been migrated from the original PHP site:
- Home page content and structure
- Ukraine aid information
- Roof fundraising campaign
- Community aid initiatives
- Church images and carousel

### Technology Stack

- **Static Site Generator**: Eleventy
- **CSS Framework**: Bootstrap 5
- **Template Engine**: Nunjucks
- **Build Tool**: npm scripts
- **Deployment**: Static files suitable for any web server

## Development

### Setup
```bash
npm install
```

### Development Server
```bash
npm start
```
The site will be available at `http://localhost:8080`

### Build for Production
```bash
npm run build
```

### Project Scripts
- `npm start` - Start development server with live reload
- `npm run build` - Build the static site to `_site/`
- `npm run clean` - Remove build directory

## Features

### Modern Web Standards
- Responsive design with Bootstrap 5
- Accessible navigation and components
- SEO-optimized with proper meta tags
- Progressive enhancement with JavaScript

### Performance
- Static files for fast loading
- Optimized images
- Minimal JavaScript footprint
- CDN-ready assets

### Maintenance
- Easy content updates via Markdown
- Version controlled source code
- Automated builds
- No database or server-side dependencies

## Deployment

The built site in `_site/` can be deployed to any static hosting service:
- GitHub Pages
- Netlify
- Vercel
- Traditional web hosting

## Future Enhancements

### Current Status
- ✅ **Home page** - Fully migrated with hero carousel, community initiatives, and donation campaigns
- ✅ **About page** - Complete parish history migration from 1912 founding to present (all languages)
- ✅ **Contact page** - Priest information, contact details, service schedule for all languages
- ✅ **Location page** - Interactive maps, addresses, transportation info for all languages
- ✅ **Links page** - Religious organizations, community resources, and donation links for all languages
- ✅ **Photos/Gallery** - Curated YouTube videos with Facebook gallery reference

### Planned Future Enhancements
- Contact forms (via external service)
- Event calendar
- Newsletter signup
- Enhanced photo gallery with more categories
- Live streaming integration

## Migration Notes

### Changes from Original PHP Site
- Converted from dynamic PHP to static HTML
- Updated from Bootstrap 3 to Bootstrap 5
- Modernized navigation and layout
- Improved mobile responsiveness
- Enhanced accessibility
- Simplified language switching

### Preserved Features
- Three-language support
- Main navigation structure
- Core content and messaging
- Visual identity and branding
- Donation links and information

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## License

This project is licensed under the ISC License - see the package.json file for details.