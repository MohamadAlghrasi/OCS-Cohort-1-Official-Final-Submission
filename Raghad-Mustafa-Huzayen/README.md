# Yalla Dodge - Dodgeball Booking System

## Project Description
Yalla Dodge is a comprehensive dodgeball game booking and management system designed for the Jordan Dodgeball Federation (JDF). The platform allows users to book weekly games, reserve private sessions, and manage game schedules through an intuitive admin dashboard.

## Features
- **User Registration & Booking System**: Users can book weekly dodgeball games online
- **Private Game Requests**: Custom private game booking with flexible scheduling
- **Admin Dashboard**: Complete management system for games, bookings, and users
- **Real-time Player Tracking**: Visual progress bars showing player registration status
- **Multi-location Support**: Games available across different venues in Amman
- **Payment Integration**: Support for cash and Clique payment methods
- **WhatsApp Community Integration**: Direct link to JDF community

## Technologies & Tools Used
- **Backend**: Laravel 10, PHP 8.2
- **Frontend**: Bootstrap 5, JavaScript, jQuery, DataTables
- **Database**: MySQL with Eloquent ORM
- **Authentication**: Custom admin authentication system
- **Icons**: Font Awesome
- **Version Control**: GitHub
- **Development Tools**: XAMPP, Composer, Git

## Installation Instructions
1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Configure database connection in `.env`
5. Run `php artisan migrate`
6. Run `php artisan serve`
7. Access the site at `http://localhost:8000`

## Admin Access
- Admin login: Access via `/admin/login`
- Features: Game management, booking approval, user management

## Project Structure
- User-facing pages: Weekly games, private booking, contact
- Admin panel: Dashboard, game management, booking management
- Database: Games, bookings, private requests, users

## Notes
- This project was developed as part of Orange Coding School Cohort 1
- Designed for Jordan Dodgeball Federation community
- Responsive design for mobile and desktop
