## Project Description
Simple Content Management System (CMS) for managing words and phrases in a
local database using a web framework. The CMS allows administrators to view, edit,
and update the content easily.

## Features
- **View**: View the words/phrases stored in the local SQLite database (each entry includes word/phrase, translation and an example sentence if available).
- **Search**: Search for words/phrases by their first language or second language.
- **Edit**: Edit entries and save them to the local database.
- **Initial Data**: At application start, content will be loaded from a JSON file to populate the local database. 

## Set up
### Dependencies
- You need PHP 8.2 or higher installed on your system.
- Laravel version 11.x (at least version 11.31 or newer).
- You need Composer installed to handle PHP dependencies.

### Instructions
1. Clone repository: `git clone https://github.com/bpagbla/langWords.git`.
2. Install dependencies: `composer install`.
3. Copy the .env.example file and create an .env file. Run `php artisan key:generate`.
4. Run application: `php artisan serve`.
