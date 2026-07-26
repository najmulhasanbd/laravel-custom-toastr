<div align="center">
  <h2>🚀 Laravel Custom Toastr</h2>
  <p>A beautifully designed, highly customizable, and easy-to-use Toastr notification package for Laravel.</p>
  
  [![Latest Version on Packagist](https://img.shields.io/packagist/v/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)
  [![Total Downloads](https://img.shields.io/packagist/dt/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)
  [![License](https://img.shields.io/packagist/l/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)

  <br><br>
  
  <h3>
    📖 <a href="https://najmulhasanbd.github.io/laravel-custom-toastr/">Read the Official Documentation</a> 📖
  </h3>
  <p>
    👉 <a href="https://najmulhasanbd.github.io/laravel-custom-toastr/#/playground"><strong>Try the Live Interactive Playground!</strong></a> 👈
  </p>
</div>

<hr>

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
    
    <x-custom-toastr position="bottom-right" duration="5000" />
</body>
</html>
```

**Customization Props:**
You can easily customize the behavior by passing these props:

- **`position`** (string): Changes the position. Default is `bottom-right`.
  - Options: `top-right`, `top-left`, `bottom-right`, `bottom-left`, `top-center`, `bottom-center`
- **`duration`** (integer): Time in milliseconds before the toast hides. Default is `5000` (5 seconds).
- **`animation`** (string): The entrance animation. Default is `slide`.
  - Options: `slide`, `fade`, `zoom`
- **`progress`** (boolean): Show or hide the countdown progress bar. Default is `true`.
- **`maxToasts`** (integer): Limit the maximum number of toasts visible at once. Default is `0` (unlimited).

### 2. Trigger Toasts from Controllers
You can easily trigger beautiful toast notifications from any of your Laravel controllers using the built-in `toastr()` helper function. No need to import any classes!

```php
class YourController extends Controller
{
    public function store()
    {
        // ... your business logic ...

        // Basic usage
        toastr()->success('Data saved successfully!');
        
        // With a Title
        toastr()->success('Data saved successfully!', 'Success!');
        
        // With Title and Custom Position
        toastr()->error('Something went wrong!', 'Oops!', 'top-center');
        
        // With Title, Custom Position, and Custom Duration (e.g. 10 seconds)
        toastr()->warning('Please check your inputs again.', 'Warning', 'bottom-left', 10000);
        
        // Info message
        toastr()->info('This is an informative message.');

        return redirect()->back();
    }
}
```

*(You can also use the Facade: `\Najmul\CustomToastr\Facades\Toastr::success(...)` if you prefer).*

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
php artisan vendor:publish --tag="najmulhasanbd-toastr-views"
```
After running this command, you will find the blade file at `resources/views/vendor/custom-toastr/components/toastr.blade.php`. You can edit this file to perfectly match your application's branding.

---

## 📜 License
This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
