-- PHILLIP DE GUZMAN
-- 28 APRIL 2026

CREATE TABLE IF NOT EXISTS user (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_name TEXT,
    user_password TEXT,
    full_name TEXT,
    email TEXT,
    age INTEGER,
    birthday TEXT,
    gender TEXT,
    subscribe boolean
);

CREATE TABLE IF NOT EXISTS events (
    event_id INTEGER PRIMARY KEY AUTOINCREMENT,
    event_name TEXT,
    event_sponsor TEXT,
    event_description TEXT,
    event_date TEXT
);
