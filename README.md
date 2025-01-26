# Laravel 11.x

This course is dedicated to the Laravel framework and cover the basics of the technology in his 11.x version.
  
## :information_desk_person: Target audience

- Beginner to intermediate developers who's want to learn how to use a modern framework on a LAMP stack.

## :hand: Prerequisites

- Docker basics (Dockerfile, docker-compose, volumes)
- PHP basics
- OOP basics (bases, principles)
- SQL basics through MySQL
- HTML / CSS basics
  
## :dart: Goals

- To understand basics of the Laravel 11.x framework and its MVC architecture.
- To set up a Laravel development environment with Docker.
- To use the Artisan CLI tool.
- To create databases schemas with Eloquent ORM migrations.
- To create database models with Eloquent ORM.
- To create user interfaces with Blade template engine.
- To use Blade directives.
- To use Blade layouts, views and partials.
- To set up routes in a Laravel 11.x application.
- To set up controllers in a Laravel 11.x application.
- To style pages using TailwindCSS.

## :clock1: Duration

- 16 hours through a **"Be my dev"** workshop.

## :bookmark_tabs: Table of contents

### Module 1: Introduction to Laravel (0.25h)

- **Introduction to Laravel:**
  - What is an MVC framework and why use it?
  - Advantages of Laravel (development speed, security, community).
  - Brief comparison with other PHP frameworks.

### Module 2: Environment setup with Docker (0.5h)

- **Installing Docker and Docker Compose (if participants haven't already):**
  - Creating a Dockerfile and docker-compose.yml.
  - Configuring MySQL in Docker.
  - Starting the environment.
- **Structure of a Laravel Project:**
  - Overview of main directories (app, routes, resources, config, database, etc.).
  - Focus on app/Http/Controllers, routes/web.php, resources/views.
  - First look: displaying a "Hello World" page.

### Module 3: models and the Eloquent ORM (2h)

- **Introduction to Databases and MySQL (quick recap):**
  - Configuring the database in Laravel (.env).
- **Migrations:**
  - Creating migrations with Artisan (php artisan make:migration create_table_name_table).
  - Defining database schemas.
  - Running migrations (php artisan migrate).
- **Eloquent Models:**
  - Creating models with Artisan (php artisan make:model ModelName).
  - Interacting with the database (create, read, update, delete).
  - Relationships between models (if time permits, a simple introduction).
  - Concrete example: saving form data to the database and displaying it.

### Module 4: Routing and controllers (1h30-2h)

- **Laravel's routing system:**
  - Defining routes in routes/web.php.
  - Types of routes (GET, POST, PUT, DELETE).
  - Parameters in routes.
  - Naming routes.
- **Controllers:**
  - Creating controllers with Artisan (php artisan make:controller ControllerName).
  - Action methods in controllers.
  - Passing data from controllers to views.
  - Concrete example: creating a simple form and processing the data.

### Module 5: Views with Blade (2h)

- **Introduction to the Blade Template Engine:**
  - Basic Blade syntax ({{ }}, @{ }, @if, @foreach, etc.).
  - Template inheritance with @extends and @section.
  - Including partial views with @include.
- **Creating Layouts and Views:**
  - Setting up a main layout.
  - Creating views to display data.
  - Concrete example: displaying form data processed in the previous module.

### Module 6: CRUD (3h30-4h)

- **Creating Views, Controllers and Routes:**
  - Creating views to display data.
  - Concrete example: displaying form data processed in the previous module.
  - Creating controllers to manage actions and data
- **Data Validation:**
  - Using Laravel's validation rules.
  - Displaying validation errors.

### Module 7: Front-end (2h)

- **Branding:**
  - Choosing a target and a name for the application

- **Views improvements:**
  - Usind Blade advanced features to put more flexibility in the layouts.
  - Using tailwind.config to setup the project.
  - Using tailwind CSS classes to improve the displays.

### Conclusion

- **General Review of Covered Concepts:**
  - Q&A session.
  - Next steps (resources, documentation, projects, ...).

## :link: Links & resources
  
### Official documentation

- [Laravel documentation](https://laravel.com/docs)
- [Laracasts](https://laracasts.com/)
- [Laravel News](https://laravel-news.com/)
- [Laravel Youtube channel](https://www.youtube.com/@LaravelPHP)
  
### Articles curation

- [Medium](https://medium.com/@steve.lebleu/list/laravel-117802714c4f)
- [Raindrop](https://raindrop.io/konfer/laravel-50534779)
