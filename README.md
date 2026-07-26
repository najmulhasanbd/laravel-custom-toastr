<div align="center">
  <h2>🚀 Laravel Custom Toastr</h2>
  <p>A beautifully designed, highly customizable, and easy-to-use Toastr notification package for Laravel.</p>
  
  [![Latest Version on Packagist](https://img.shields.io/packagist/v/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)
  [![Total Downloads](https://img.shields.io/packagist/dt/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)
  [![License](https://img.shields.io/packagist/l/najmulhasanbd/laravel-custom-toastr.svg?style=flat-square)](https://packagist.org/packages/najmulhasanbd/laravel-custom-toastr)

  <br><br>
</div>

## About Laravel Custom Toastr

Laravel Custom Toastr is a powerful and easy-to-use package that allows you to quickly and easily add flash messages to your Laravel projects. Whether you need to alert users of a successful form submission, an error, or any other important information, flash messages are a simple and effective solution for providing feedback to your users.

With Laravel Custom Toastr, you can easily record and store messages within the session, making it simple to retrieve and display them on the current or next page. This improves user engagement and enhances the overall user experience on your website or application.

Whether you're a beginner or an experienced developer, Laravel Custom Toastr's intuitive and straightforward design makes it easy to integrate into your projects. So, if you're looking for a reliable, flexible and easy to use flash messages solution, Laravel Custom Toastr is the perfect choice.

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

### 2. Trigger Toasts from Controllers
You can easily trigger beautiful toast notifications from any of your Laravel controllers using the built-in `toastr()` helper function. No need to import any classes!

```php
class YourController extends Controller
{
    public function store()
    {
        toastr()->success('Data saved successfully!');
        toastr()->error('Something went wrong!', 'Oops!');
        toastr()->warning('Please check your inputs again.', 'Warning', 'bottom-left', 10000);
        toastr()->info('This is an informative message.');

        return redirect()->back();
    }
}
```

*(You can also use the Facade: `\Najmul\CustomToastr\Facades\Toastr::success(...)` if you prefer).*

---

## 📖 Official Documentation

Documentation for Laravel Custom Toastr can be found on our [Official GitHub Pages](https://najmulhasanbd.github.io/laravel-custom-toastr/).

👉 [**Try the Live Interactive Playground!**](https://najmulhasanbd.github.io/laravel-custom-toastr/#/playground)

---

## 🤝 Contributors and sponsors

Join our team of contributors and make a lasting impact on our project!

We are always looking for passionate individuals who want to contribute their skills and ideas. Whether you're a developer, designer, or simply have a great idea, we welcome your participation and collaboration.

Shining stars of our community:

<div align="center">
  <br>
  <img src="https://github.com/najmulhasanbd.png" width="80" style="border-radius:50%;"><br>
  <strong>Md Najmul Hasan</strong><br>
  💻 📖
</div>

---

## 📧 Contact

Laravel Custom Toastr is being actively developed by **Md Najmul Hasan**. You can reach out with questions, bug reports, or feature requests on any of the following:

- [Github Issues](https://github.com/najmulhasanbd/laravel-custom-toastr/issues)
- [Github](https://github.com/najmulhasanbd)
- [Email me directly](mailto:najmulcse247@gmail.com)

---

## 📜 License

Laravel Custom Toastr is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Made with ❤️ by [Md Najmul Hasan](https://github.com/najmulhasanbd)
