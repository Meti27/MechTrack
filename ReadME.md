🚗 MechTrack – Mechanic Workshop Management System

A full Laravel-based application for managing customers, vehicles, and repair orders in a mechanic workshop.
Includes a public repair tracking form, admin dashboard, authentication system, and a responsive dark UI.

📌 Features
🔐 Authentication & Security

Laravel Breeze for authentication (Login, Register, Password Reset)

Email verification support

Role-based access (public vs admin pages)

CSRF protection enabled throughout

🛠️ Admin Panel (CMS)

A dedicated administration panel for workshop employees:

✔ Customers Management

Add, edit, delete customers

View list of all clients

✔ Vehicles Management

Assign vehicles to customers

Add, edit, delete vehicles

Link between customers and their vehicles

✔ Repair Orders Management

Create repair orders for any vehicle

Track repair status (pending, in progress, completed)

Add total cost and notes

Edit or delete repair jobs

✔ Dashboard Overview

Displays workshop metrics:

Total customers

Total vehicles

Total repair orders

Total revenue

🌍 Public Features

Home page for customers

Repair tracking form (search repair by ID or vehicle plate)

Clean and simple UI for non-admin users

📱 Responsive UI

Fully mobile-friendly

Custom dark theme with amber highlights

Modern off-canvas menu

Table and card layouts adapt to any screen size

🧱 Tech Stack
Layer	Technology
Backend	Laravel 10+
Frontend	Blade + Bootstrap 5
Database	MySQL
Authentication	Laravel Breeze
Architecture	MVC
Styling	Custom Dark Theme (CSS overrides)
🗂️ Project Structure
/app
/Http
/Controllers
PublicController.php
Admin/
DashboardController.php
CustomerController.php
VehicleController.php
RepairOrderController.php
/resources
/views
/layouts
mechtrack.blade.php
/public
/admin
...
/routes
web.php

🛠️ Installation Instructions
1. Clone the repository
   git clone https://github.com/yourusername/mechtrack.git
   cd mechtrack

2. Install dependencies
   composer install
   npm install

3. Environment setup

Copy .env.example:

cp .env.example .env


Edit the database section:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mechtrack
DB_USERNAME=root
DB_PASSWORD=yourpassword

4. Generate key
   php artisan key:generate

5. Run migrations
   php artisan migrate

6. Start the development server
   php artisan serve
   npm run dev

👤 Default Admin Access

After registering a new user via /register, grant admin privileges manually:

UPDATE users SET is_admin = 1 WHERE id = 1;

🧪 Testing

Project supports Pest & Laravel default testing:

php artisan test

🎨 Custom Theme

MechTrack includes:

Custom dark theme

Improved table styling

Modern card UI

Offcanvas mobile menu

Clean typography and colors

Editable in:

resources/views/layouts/mechtrack.blade.php

🚀 Future Improvements

Optional enhancements you may implement:

PDF invoice generation

Search bar for customers/vehicles

Multi-language support

Role system (admin vs staff)

API endpoints for mobile app

Notifications for completed repairs

💬 Author


🧠 DevOps Workflow Documentation

DevOps improves delivery by:

Running code tests after every push

Validating builds automatically

Providing CI pipeline feedback

Preparing deployment code

CI Tasks:

Checkout repository

Setup Java and Maven

Run tests

Build JAR

Deployment Flow:

Developer commits changes

Push to GitHub

CI pipeline builds

Tests validate

App ready to deploy 

MechTrack created by Muhamed Iseni —
Designed as a complete Laravel workshop app project.
