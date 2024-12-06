
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

The package also provides a route file, controller, and policy to help integrate Laravel's built-in `HandleCors` middleware with the storage directory's files. This allows you to manage cross-origin file requests and ensure smooth file handling across different domains.

To publish the `HandleCors` middleware integration files, add the `--with-cors` flag to the command:

```bash
php artisan file-management:install --with-cors
```

The following files will be generated:

- **Route**: `routes/resources/file.php`  
- **Controller**: `app/Http/Controllers/FileController.php`  
- **Policy**: `app/Policies/FilePolicy.php`  

By default:  
- The generated routes are guarded by the `auth:sanctum` middleware.  
- The `FileController`'s `download` method is authorized using the `FilePolicy`.  
- The `FilePolicy`'s `download` method is pre-configured to return `true`, granting access to file downloads.  

You can customize the route file, controller, and policy to fit your project's specific requirements and security policies.

### Customization

The generated code serves as a starting point. You can customize and extend it according to your project's requirements. Modify the generated migrations, models, traits and validation rules as needed.

## Contributing

Contributions are welcome! If you have suggestions, bug reports, or feature requests, please open an issue on the GitHub repository.

## License

This package is open-source software licensed under the [MIT license](LICENSE).
