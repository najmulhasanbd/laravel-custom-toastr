# Project History & Documentation: Laravel Custom Toastr

This document serves as a history of the features developed and design decisions made for the `laravel-custom-toastr` package. Future AI agents or developers can read this to instantly understand the context of this project.

## Project Goal
Create a lightweight, dependency-free (Vanilla JS/CSS), and highly customizable Toastr notification package for Laravel with a premium design.

## Features Implemented
1. **Zero Dependencies:** No JQuery required. Pure Vanilla JS and CSS.
2. **Dynamic Blade Component:** `<x-custom-toastr />` handles session flashes automatically (`Success`, `Error`, `Warning`, `Info`).
3. **Advanced Customization:** 
   - Position: `top-right`, `top-left`, `bottom-right`, `bottom-left`, `top-center`, `bottom-center`
   - Animations: `slide`, `fade`, `zoom`
   - Progress Bar: Configurable (`true`/`false`)
   - Duration: Custom timeout in milliseconds.
   - Max Toasts: Limits how many toasts can appear on screen at once.
4. **Helper Functions & Facade:** Trigger toasts easily from controllers (e.g., `toastr()->success('Message', 'Title');`).
5. **Interactive Close:** Users can click on a toast to instantly dismiss it.

## Documentation Website (Docsify)
- Hosted via GitHub Pages in the `/docs` directory.
- Features a premium **Indigo Theme** (`#4f46e5`).
- Includes a **Coverpage** (`_coverpage.md`) with a "Try it Live!" button.
- Includes an **Interactive Playground** (`playground.md`) where users can click buttons to see real live toasts on the screen.
- A custom Docsify plugin was added to `index.html` that injects a **"▶️ Run"** button into Javascript code blocks, allowing users to execute code directly from the documentation.

## SEO Optimization
- Added an extensive list of highly targeted keywords to `composer.json` to ensure the package ranks well on Packagist and Google search results (e.g., "laravel toastr", "laravel alert", "laravel 12").

## Versions Released
- We bumped versions multiple times (up to `v1.0.9`) using Git tags (`git tag v1.0.X` -> `git push origin --tags`) to sync updates with Packagist.
- The `master` and `main` branches are kept in sync via forced pushes to prevent Packagist cache issues.
