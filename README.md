# Laravel Custom Toastr

A beautifully designed, customizable Toastr package for Laravel.

## Installation

Since this package is currently local, you can add it to your Laravel project's `composer.json` using a path repository:

```json
"repositories": [
    {
        "type": "path",
        "url": "../path/to/laravel-custom-toastr"
    }
]
```

Then run:
```bash
composer require najmulhasanbd/laravel-custom-toastr
```

*(If you publish this to Packagist later, you can just run `composer require najmulhasanbd/laravel-custom-toastr` directly without the repositories block).*

## Usage

### 1. Include the Component
In your main layout file (e.g., `resources/views/layouts/app.blade.php`), include the Blade component right before the closing `</body>` tag:

```blade
    <!-- other body content -->
    <x-custom-toastr />
</body>
</html>
```

### 2. Trigger Toasts from Controllers
You can easily trigger toasts from any of your Laravel controllers using the `Toastr` facade:

```php
use Najmul\CustomToastr\Facades\Toastr;

class YourController extends Controller
{
    public function store()
    {
        // ... your logic

        Toastr::success('Data saved successfully!');
        Toastr::error('Something went wrong!');
        Toastr::warning('Please check your inputs.');
        Toastr::info('This is an info message.');

        return redirect()->back();
    }
}
```

### 3. Trigger Toasts from Javascript (Optional)
The component exposes a global Javascript function `customToastr(type, message)`. You can call this from your frontend scripts:

```javascript
customToastr('Success', 'This is a JS triggered success message!');
```

## Publishing Views (Optional)
If you want to customize the HTML, CSS, or Javascript of the toastr component in your project, you can publish the view:

```bash
php artisan vendor:publish --tag="custom-toastr-views"
```
This will copy the blade file to `resources/views/vendor/custom-toastr/components/toastr.blade.php` where you can edit it.

## Publishing to Packagist (Global Usage)
To make this available globally so anyone can install it:
1. Push this folder (`laravel-custom-toastr`) to a public GitHub repository.
2. Go to [Packagist.org](https://packagist.org/) and log in.
3. Click "Submit" and paste your GitHub repository URL.
4. Now anyone can run `composer require najmulhasanbd/laravel-custom-toastr`.
