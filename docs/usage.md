# Usage

You can easily trigger beautiful toast notifications from any of your Laravel controllers using the built-in `toastr()` helper function. No need to import any classes!

## Basic Examples

```php
class YourController extends Controller
{
    public function store()
    {
        // ... your business logic ...

        // Basic usage (uses default position and duration from blade component)
        toastr()->success('Data saved successfully!');
        
        // Info message
        toastr()->info('This is an informative message.');
        
        // Warning message
        toastr()->warning('Please check your inputs again.');
        
        // Error message
        toastr()->error('Something went wrong!');

        return redirect()->back();
    }
}
```

## Advanced Examples (Title, Position, Duration)

You can pass additional arguments to the helper functions to customize specific toasts without affecting the global defaults.

The method signature is:
`toastr()->success($message, $title = null, $position = null, $duration = null)`

```php
// With a Title
toastr()->success('Data saved successfully!', 'Success!');

// With Title and Custom Position
toastr()->error('Something went wrong!', 'Oops!', 'top-center');

// With Title, Custom Position, and Custom Duration (e.g. 10 seconds)
toastr()->warning('Please check your inputs again.', 'Warning', 'bottom-left', 10000);
```

*(You can also use the Facade: `\Najmul\CustomToastr\Facades\Toastr::success(...)` if you prefer).*

## Triggering via Javascript (Optional)

If you need to show a toast message using JavaScript (for example, after an AJAX request), the package exposes a global function for you:

```javascript
// Available types: 'Success', 'Error', 'Warning', 'Info'
// Signature: customToastr(type, message, title = null, position = null, duration = null)

customToastr('Success', 'This is a JS triggered success message!');
customToastr('Error', 'Action failed!', 'Oh no!', 'top-right', 8000);
```
