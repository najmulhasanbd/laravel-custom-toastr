<div align="center">
    <h1>🚀 Laravel Toastr Message</h1>
    <p>A beautifully designed, customizable, and easy-to-use Toastr notification package for Laravel.</p>
</div>

---

## ✨ Features
- **Plug & Play:** Extremely easy to integrate into any Laravel project.
- **Modern Design:** Beautifully crafted UI with smooth animations.
- **Blade Component:** Comes with a ready-to-use `<x-custom-toastr />` component.
- **Session Flashing:** Automatically detects Laravel session flashes (Success, Error, Warning, Info).
- **Customizable:** Fully publishable views so you can tweak the HTML/CSS/JS as you like!

---

## 📦 Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require najmulhasanbd/laravel-custom-toastr
```

---

## 🛠️ Usage

Using this package is incredibly simple. Just follow these two steps:

### 1. Include the Component
In your main layout file (usually `resources/views/layouts/app.blade.php`), include the Blade component right before the closing `</body>` tag:

```blade
    <!-- Your application content -->
    
    <x-custom-toastr />
</body>
</html>
```

### 2. Trigger Toasts from Controllers
You can easily trigger beautiful toast notifications from any of your Laravel controllers using the `Toastr` facade:

```php
use Najmul\CustomToastr\Facades\Toastr;

class YourController extends Controller
{
    public function store()
    {
        // ... your business logic ...

        Toastr::success('Data saved successfully!');
        // Toastr::error('Something went wrong!');
        // Toastr::warning('Please check your inputs again.');
        // Toastr::info('This is an informative message.');

        return redirect()->back();
    }
}
```

### ⚡ Triggering via Javascript (Optional)
If you need to show a toast message using JavaScript (for example, after an AJAX request), the package exposes a global function for you:

```javascript
// Available types: 'Success', 'Error', 'Warning', 'Info'
customToastr('Success', 'This is a JS triggered success message!');
```

---

## 🎨 Customization

The default design is modern and clean, but if you want to customize the HTML, CSS, or JavaScript, you can easily publish the component view to your project:

```bash
php artisan vendor:publish --tag="custom-toastr-views"
```
After running this command, you will find the blade file at `resources/views/vendor/custom-toastr/components/toastr.blade.php`. You can edit this file to perfectly match your application's branding.

---

## 📜 License
This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
