# Club E-Z Money — Website Design Project

A multi-page PHP website built for a fictional student organization ("Club E-Z Money"), 
developed as a course project for ODU CS312. Implements full user authentication, 
session management, and a database-backed event system.

## Features

- **User authentication** — registration with server-side validation, bcrypt-style 
  password hashing (`password_hash`/`password_verify`), and session-based login/logout
- **Event management** — logged-in users can create new events (name, sponsor, 
  description, date) with both client-side and server-side validation; all events 
  are listed dynamically from the database, sorted by date
- **SQLite persistence** — user accounts and events are stored via prepared 
  statements (protecting against SQL injection)
- Multi-page site (Home, About, Events, Gallery, Resources, Registration, Login) 
  with shared layout components (header, footer, menu) via PHP includes
- Custom CSS styling, including a shared stylesheet and simple CSS animation

## Tech Stack

- **PHP** — page templating, session management, form validation, SQLite interaction
- **SQLite** — user accounts and event data persistence
- **HTML/CSS/JavaScript** — page structure, styling, and client-side form validation

## Structure

- `index.php`, `about.php`, `events.php`, `gallery.php`, `resources.php` — main pages
- `login.php` / `login_action.php` — login form and authentication logic
- `registration.php` / `registration_action.php` — registration form and account creation
- `new_event.php` / `new_event_action.php` — event creation form and insertion logic
- `logout_action.php` — session termination
- `header.php`, `footer.php`, `menu.php` — shared layout includes
- `makedb.sql` — database schema (users and events tables)
- `std.css` — site-wide stylesheet

## Running Locally

Requires a local PHP environment with the SQLite3 extension enabled (e.g. 
[XAMPP](https://www.apachefriends.org/) or PHP's built-in server).

1. Clone the repo
2. From the project directory, run:
```
php -S localhost:8000
```
3. Open `http://localhost:8000` in your browser
4. The database schema (`makedb.sql`) is applied automatically on first registration

## Notes

Built and tested locally as a course project; not deployed to a live server.
