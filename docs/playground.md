# Interactive Playground

Click the buttons below to see **Laravel Custom Toastr** in action right here in the documentation!

## Basic Alerts

<div style="display: flex; gap: 10px; margin-bottom: 20px;">
    <button onclick="customToastr('Success', 'Data saved successfully!')" style="padding: 8px 16px; background-color: #198754; color: white; border: none; border-radius: 4px; cursor: pointer;">Success</button>
    
    <button onclick="customToastr('Error', 'Something went wrong!')" style="padding: 8px 16px; background-color: #DC3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Error</button>
    
    <button onclick="customToastr('Warning', 'Please check your inputs again.')" style="padding: 8px 16px; background-color: #FFC107; color: black; border: none; border-radius: 4px; cursor: pointer;">Warning</button>
    
    <button onclick="customToastr('Info', 'This is an informative message.')" style="padding: 8px 16px; background-color: #0DCAF0; color: black; border: none; border-radius: 4px; cursor: pointer;">Info</button>
</div>

```javascript
customToastr('Success', 'Data saved successfully!');
customToastr('Error', 'Something went wrong!');
customToastr('Warning', 'Please check your inputs again.');
customToastr('Info', 'This is an informative message.');
```

---

## With Titles

<div style="display: flex; gap: 10px; margin-bottom: 20px;">
    <button onclick="customToastr('Success', 'Your profile has been updated.', 'Profile Saved!')" style="padding: 8px 16px; background-color: #198754; color: white; border: none; border-radius: 4px; cursor: pointer;">Success with Title</button>
</div>

```javascript
customToastr('Success', 'Your profile has been updated.', 'Profile Saved!');
```

---

## Different Positions

<div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 20px;">
    <button onclick="customToastr('Info', 'I am at the top left!', 'Top Left', 'top-left')" style="padding: 8px; cursor: pointer;">Top Left</button>
    <button onclick="customToastr('Info', 'I am at the top center!', 'Top Center', 'top-center')" style="padding: 8px; cursor: pointer;">Top Center</button>
    <button onclick="customToastr('Info', 'I am at the top right!', 'Top Right', 'top-right')" style="padding: 8px; cursor: pointer;">Top Right</button>
    <button onclick="customToastr('Info', 'I am at the bottom left!', 'Bottom Left', 'bottom-left')" style="padding: 8px; cursor: pointer;">Bottom Left</button>
    <button onclick="customToastr('Info', 'I am at the bottom center!', 'Bottom Center', 'bottom-center')" style="padding: 8px; cursor: pointer;">Bottom Center</button>
    <button onclick="customToastr('Info', 'I am at the bottom right!', 'Bottom Right', 'bottom-right')" style="padding: 8px; cursor: pointer;">Bottom Right</button>
</div>

```javascript
customToastr('Info', 'I am at the top left!', 'Top Left', 'top-left');
customToastr('Info', 'I am at the bottom center!', 'Bottom Center', 'bottom-center');
```

---

## Long Duration (10 Seconds)

<div style="margin-bottom: 20px;">
    <button onclick="customToastr('Warning', 'This message will stay for 10 seconds.', 'Long Toast', 'bottom-right', 10000)" style="padding: 8px 16px; background-color: #FFC107; color: black; border: none; border-radius: 4px; cursor: pointer;">Show 10s Toast</button>
</div>

```javascript
customToastr('Warning', 'This message will stay for 10 seconds.', 'Long Toast', 'bottom-right', 10000);
```
