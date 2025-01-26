# Be My Dev on Laravel 11.x

## Play rules

- Each player starts by doing a fork of this repository.

- Each player draws a "Master" card, designating them as responsible for presenting an aspect of the application (Model, Routing, etc.).

- Each player receives 7 "Help" cards:
  - 3 "Help, I need somebody... Help" cards: variable modalities
  - 2 "Pair programming" cards: 1 card per player, 1 hour max
  - 2 "AI Hackerman" cards: 1 card, 1 prompt

- A "Help, I need somebody... Help" card can be played in different ways:
  - Receive individual help from the trainer (2 cards, 15 min max)
  - Receive individual help from a peer (1 card per player, 30 min max)
  - Receive collective help from the trainer (1 card per player, 1 topic, no time limit)

- Each application is peer-reviewed based on the following criteria:
  - Project presentation
    - Features (is everything there and working?)
    - Front-end
      - no bugs
      - aesthetics
      - branding
      - ergonomy
      - navigation
      - performances
      - code quality
    - Back-end
      - no bugs
      - code quality
  - Master presentation

- Allowed resources:
  - Slides
  - Google
  - Laravel documentation

### Available "Master" cards

- Laravel
  - What's a framework ?
  - Why Laravel is a good choice to build an application ?
  - What can you say about the Laravel ecosystem ?
  - What's the structure of a Laravel project ?
  - What's the available NPM commands in a Laravel project ?
  - What's the vite.config.js file ? What's his purpose ?
- OOP
  - Give an overview of the Laravel API
  - What's the root namespace of the Laravel API ?
  - Select and explain 3 namespaces of the Laravel API you find interesting.
  - Give an example of each OOP pilar implementation in Laravel, and explain why it's a good choice.
- Routes and controllers
  - What's a router in Laravel ?
  - Where are declared the routes in Laravel ?
  - What's the link between a router and a controller ? Explain the difference.
- Composer
  - What's Composer ?
  - What's the benefits of Composer ?
  - How it's used in a Laravel project ?
- Artisan
  - What's Artisan ?
  - What's the benefits of Artisan ?
  - How it's used in a Laravel project ?
  - What's the main commands you recommend to use in a Laravel project ?
- Eloquent
  - What's Eloquent ?
  - How it's used in a Laravel project ?
  - What's the benefits of Eloquent ?
  - What's a Model in the context of Eloquent ?
  - How to generate a migration with Eloquent ?
- Blade
  - What's Blade ?
  - What's the benefits of Blade ?
  - How it's used in a Laravel project ?
  - Explain the main syntax features of Blade (variables, loops, conditions, inheritance).
  - What's a layout in the context of Blade ?
  - What's a block in the context of Blade ?

## Specifications

### Technical

- Environment
  - Docker
  - Laravel 11.x
  - MySQL 8.x
- ORM with Eloquent
- Rendering with Blade
- Styling with TailwindCSS

### Functionnal

- Theme: video games application
- Attractive homepage
- Features
  - Navigation
  - Footer
  - Creation of a video game
  - List of video games
  - Detail of a video game
  - Update of a video game
  - Deletion of a video game
