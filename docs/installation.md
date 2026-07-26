# Installation

Getting started with Laravel Custom Toastr is incredibly easy.

## 1. Install via Composer

Run the following command in your terminal at the root of your Laravel project:

```bash
composer require najmulhasanbd/laravel-custom-toastr
```

Since the package supports Laravel's Auto-Discovery, the Service Provider and Facade will be registered automatically!

## 2. Setup the Component

In your main layout file (usually `resources/views/layouts/app.blade.php`), include the Blade component right before the closing `</body>` tag:

```blade
<!DOCTYPE html>
<html>
<head>
    <!-- Head content -->
</head>
<body>
    <!-- Your application content -->
    
    <x-custom-toastr />
</body>
</html>
```

And that's it! You are ready to start triggering beautiful notifications.

Check out the **[Usage](usage.md)** guide to see how to trigger toasts.
