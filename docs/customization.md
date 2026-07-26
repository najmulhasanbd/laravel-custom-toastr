# Customization

The package is designed to be highly customizable, both via simple props and deep HTML/CSS modifications.

## Global Props

You can set global defaults for all toasts on a page by passing props to the Blade component. These act as fallbacks if a specific toast doesn't override them.

```blade
<x-custom-toastr 
    position="bottom-right" 
    duration="5000" 
    animation="slide" 
    :progress="true" 
    maxToasts="3" 
/>
```

### Available Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `position` | string | `bottom-right` | Defines where the toasts appear on the screen.<br>**Options:** `top-right`, `top-left`, `bottom-right`, `bottom-left`, `top-center`, `bottom-center` |
| `duration` | integer | `5000` | Time in milliseconds before the toast automatically hides. |
| `animation` | string | `slide` | The entrance and exit animation style.<br>**Options:** `slide`, `fade`, `zoom` |
| `progress` | boolean | `true` | Whether to show the shrinking timeline at the bottom of the toast. Pass `:progress="false"` to hide it. |
| `maxToasts` | integer | `0` | Limit the maximum number of toasts visible at once. `0` means unlimited. If the limit is exceeded, the oldest toast is removed. |

## Deep Customization (Publishing Views)

If the default modern design isn't exactly what you need, you can easily publish the Blade component and customize the HTML, CSS, or JavaScript directly!

Run this command in your terminal:

```bash
php artisan vendor:publish --tag="najmulhasanbd-toastr-views"
```

After running this command, you will find the blade file at:
`resources/views/vendor/custom-toastr/components/toastr.blade.php`

You can edit this file to perfectly match your application's branding, change the FontAwesome icons, or rewrite the CSS entirely.
