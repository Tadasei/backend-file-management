
# Tadasei/backend-file-management

This package provides stubs for managing files in the backend of a Laravel application. It aims to simplify and streamline common Store, Update and Delete file operations by providing pre-defined structures.

## Features

- Quickly generate file management migrations, models, validation rules and handling logic.
- Customize and extend generated code to fit your project's needs.
- Improve development efficiency by eliminating repetitive tasks.

## Installation

You can install the package via Composer by running:

```bash
composer require tadasei/backend-file-management --dev
```

## Usage

### Publishing file management utilities

To publish file management utilities, use the following command:

```bash
php artisan file-management:install
```

#### Integration with HandleCors Middleware

The package also provides a route file and controller to help integrate Laravel's built-in `HandleCors` middleware with the storage directory's files. This allows you to manage cross-origin file requests and ensure smooth file handling across different domains.

To publish the `HandleCors` middleware integration files, add the `--with-cors` flag to the same command:

```bash
php artisan file-management:install --with-cors
```

The route file and controller can be customized to fit your project's CORS policies. You'll find the generated files in the following locations:

- **Route**: `routes/resources/file.php`
- **Controller**: `app/Http/Controllers/FileController.php`

### Customization

The generated code serves as a starting point. You can customize and extend it according to your project's requirements. Modify the generated migrations, models, traits and validation rules as needed.

## Contributing

Contributions are welcome! If you have suggestions, bug reports, or feature requests, please open an issue on the GitHub repository.

## License

This package is open-source software licensed under the [MIT license](LICENSE).
