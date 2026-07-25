# CS312 Website Design Project

A multi-page website built for a fictional organization, developed as a course project 
for ODU CS312. Demonstrates front-end page structure/styling and 
server-side PHP functionality, including a SQLite-backed events submission system.

## Features

- Multi-page site (Home, About, Events, Gallery, Resources) with shared layout 
  components (header, footer, menu) via PHP includes
- Schedule submission form backed by a SQLite database — users can submit and 
  view scheduled events dynamically
- Custom CSS styling across all pages via a shared stylesheet

## Tech Stack

- **PHP** — page templating (includes) and SQLite database interaction
- **HTML/CSS** — page structure and styling
- **SQLite** — lightweight database for schedule data persistence

## Structure

- `index.php` — homepage
- `about.php` — organization info
- `events.php` — event listing / schedule submission
- `gallery.php` — image gallery
- `resources.php` — resources page
- `header.php`, `footer.php`, `menu.php` — shared layout includes
- `std.css` — site-wide stylesheet

## Running Locally

This project requires a local PHP environment with SQLite support (e.g. via 
[XAMPP](https://www.apachefriends.org/) or PHP's built-in server).

1. Clone the repo
2. Ensure PHP is installed with the SQLite3 extension enabled
3. From the project directory, run:
   php -S localhost:8000
4. Open `http://localhost:8000` in your browser

## Notes

This was built and tested locally as a course project; it was not deployed to a 
live server.
