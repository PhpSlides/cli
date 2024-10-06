# PhpSlides

<p align="center">
   <a href="https://packagist.org/packages/phpslides/framework"><img src="https://img.shields.io/packagist/dt/phpslides/framework" alt="Total Downloads"></a>
   <a href="https://packagist.org/packages/phpslides/framework"><img src="https://img.shields.io/packagist/v/phpslides/framework" alt="Latest Stable Version"></a>
   <a href="https://packagist.org/packages/phpslides/framework"><img src="https://img.shields.io/packagist/l/phpslides/framework" alt="License"></a>
</p>

Welcome to PhpSlides!<br>
This framework is a PHP revolution,
designed to provide a simple and scalable structure for developing full-stack web applications
using the Model-View-Controller (MVC) architectural pattern.

With PhpSlides, you can write HTML, CSS, and JavaScript in a PHP-like way,
streamlining the development process and enhancing productivity.

## Table of Contents

-  [PhpSlides](#phpslides)
   -  [Table of Contents](#table-of-contents)
   -  [Introduction](#introduction)
   -  [Features](#features)
   -  [Requirements](#requirements)
   -  [Installation](#installation)
      -  [Install with Composer](#install-with-composer)
      -  [Or Clone the Repository](#or-clone-the-repository)
   -  [Configuration](#configuration)
      -  [.env](#env)
      -  [configs.json](#configjson)
   -  [Syntax](#syntax)
      -  [Creating Web Layouts](#creating-web-layouts)
      -  [Styling Web Layouts](#styling-web-layouts)
      -  [Creating Web Routes](#creating-web-routes)
      -  [Creating API Routes](#creating-api-routes)
   -  [Directory Structure](#directory-structure)
   -  [Documentation](#documentation)
   -  [Contributing](#contributing)
   -  [License](#license)
   -  [Financial Support](#financial-support)

## Introduction

PhpSlides is a lightweight, easy-to-use full-stack framework that helps you build web applications quickly and efficiently.
It follows the MVC architectural pattern, separating the application logic into models, views, and controllers to promote code organization and reusability.

Additionally, it provides the capability to write HTML, CSS, and JavaScript in a PHP-like way, making it easier to manage and maintain your front-end and back-end code together.

## Features

-  **Full-Stack Development**: Seamlessly integrate front-end and back-end development by writing HTML, CSS, and JavaScript in a PHP-like syntax.
-  **Simple Routing**: Easily define routes and map them to controllers and actions.
-  **Modular Structure**: Organized directory structure for models, views, controllers, and other components.
-  **Database Forgery**: A unique feature that allows you to manage your databases and tables using a structured directory format, automatically generating and managing schema migrations based on directory and file structures.
-  **AuthGuard Support**: Add authorization guard to handle authentication, logging, and other tasks.

## Requirements

-  PHP 8.2 or higher
-  Composer
-  A web server (e.g., Apache, Nginx)

## Installation

### Install with Composer

```bash
composer create-project phpslides/phpslides ProjectName
cd ProjectName
```

### Or Clone the Repository

1. **Clone the repository:**

   ```bash
   git clone https://github.com/phpslides/phpslides.git
   cd phpslides
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up the web server:**

   Point your web server to the document root.

4. **Configure the environment:**

   If the .env file does not exist, copy the env example configuration file and update it with your settings:

   ```bash
   cp .env.example .env
   ```

## Configuration

### .env

Edit the .env file to configure database settings, application settings, and other configurations.

```bash
APP_NAME=PhpSlides
APP_VERSION=1.3.x
APP_DEBUG=true
APP_ENV=development
```

### config.json

Which handles the behavior of a viewing files on the web

```json
{
	"deny": ["public/assets/*.png"],
	"message": {
		"contents": "403 | Forbidden",
		"components": "Errors::403",
		"content-type": "text/html"
	},
	"charset": "UTF-8"
}
```

## Syntax

### Creating Web Layouts

```php
<?php

DOM::create('app')->root([
   ['id' => 'root'],
   Tag::Container([],
     Tag::Input(['type' => 'text'], '$$name')
     Tag::Text([], 'Hello $$name')
   )
]);

DOM::render('app');

?>
```

### Styling Web Layouts

```php
<?php

$style = StyleSheet::create([
   'RootStyle' => [
      Style::Size => Screen::100,
      Style::BackgroundImage => asset('bg.png'),
   ],
   'TextStyle' => [
      Style::Color => Color::White,
      Style::FontSize => Font::Base,
      Style::FontWeight => Font::Bold
   ]
]);

export($style, 'AppStyle');

?>
```

### Creating Web Routes

```php
<?php

Route::map(POST, '/index')
  ->action('Controller::method')
  ->name('index');

?>
```

### Creating API Routes

```php
<?php

Api::v1()->define('/user', 'UserController')
  ->map([
      '/info' => [GET, '@index'],
      '/{id}' => [GET, '@show'],
  ])
  ->withGuard('auth')
  ->name('user');

$user_id_route = route('user::1');

?>
```

## Directory Structure

Here's an overview of the project directory structure:

project_root/<br>
├── app/<br>
│ ├── Controller/<br>
│ ├── Guards/<br>
│ ├── Forge/<br>
├── public/<br>
├── src/<br>
│ ├── bootstrap/<br>
│ ├── configs/<br>
│ ├── resources/<br>
│ │ └── views/<br>
├── vendor/<br>
├── .env<br>
├── .env.example<br>
├── .htaccess<br>
├── composer.json<br>
├── configs.json<br>
├── LICENSE<br>
├── README.md<br>
└── slide

## Documentation

For detailed documentation, including advanced usage,
API references, and more, please visit our [documentation website](#).

## Contributing

We welcome contributions from the community!
If you'd like to contribute,
please follow these steps:

<ol>
   <li>Fork the repository.</li>
   <li>Create a new branch (git checkout -b name/your-feature).</li>
   <li>Commit your changes (git commit -am 'Add a new feature').</li>
   <li>Push to the branch (git push origin name/your-feature).</li>
   <li>Create a new Pull Request.</li>
</ol>

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/PhpSlides/phpslides/blob/master/LICENSE) file for more details.

## Financial Support

Your contributions help us maintain and improve PhpSlides.
If you find PhpSlides useful, please consider supporting us financially.
Every bit of support goes a long way in ensuring we can continue to develop and enhance the framework.

[Support Now!](https://buymeacoffee.com/dconco)
