# Travel Explore

Travel Explore is a comprehensive travel management system designed to simplify the process of planning, booking, and managing travel reservations. The system allows users to explore various travel offers, activities, make reservations, generate detailed reports, and automate notifications with QR code generation.


## Table of Contents

- [Project Description](#project-description)
- [Features](#features)
- [Setup Instructions](#setup-instructions)
- [Usage Guide](#usage-guide)
- [Contribution Guidelines](#contribution-guidelines)
- [License](#license)

## Project Description

Travel Explore is built using WordPress, PHP, and Timber to provide a flexible travel reservation system. The main purpose of the project is to streamline the travel booking process and ensure a smooth experience for both users and administrators.

## Features

- **Custom Post Types**: Manage travel reservations with custom post types.
- **Custom Fields**: Capture essential reservation details like name, travel destination, number of people, and more.
- **QR Code Generation**: Automatically generate QR codes for each reservation, containing all reservation details.
- **Email Notifications**: Send reservation details via email upon admin approval.
- **Admin Approval Workflow**: Ensure reservations are only finalized and emailed after admin approval.
- **Responsive Design**: Fully responsive design using Tailwind CSS for a seamless user experience across all devices.
- **User Journey Post Type**: Users can log in and add posts about their travel experiences related to any offer.
- **Alternative Tourism Post Type**: This post type is designed for adding and showcasing diverse travel activities, such as biking, hiking, and other unique experiences. It allows you to feature various adventure options, helping travelers discover exciting activities during their trips.
- **Blog Post Type**: Share articles, tips, and news related to travel.
- **Star Ratings**: Provide star ratings for travels to help users make informed decisions.
- **Map Guideline**: Show locations and provide guidelines on how to get to them using an integrated map feature.

## Setup Instructions

### Prerequisites

- [WordPress](https://wordpress.org/download/) (Latest Version)
- [PHP](https://www.php.net/downloads) (>=7.4)
- [Composer](https://getcomposer.org/download/)
- [Node.js & npm](https://nodejs.org/en/download/)
- [Git](https://git-scm.com/downloads)

### Dependencies

- Timber
- Advanced Custom Fields (ACF)
- Laravel Mix
- Autoprefixer
- PostCSS
- Tailwind CSS
- Animate.css
- jQuery
- FancyBox
- Leaflet
- Leaflet Routing Machine
- Swiper

### Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/kushtrimsalihu/travel-explore
    cd travel-explore
    ```

2. **Install PHP dependencies:**
    ```bash
    composer install
    ```

3. **Install JavaScript dependencies:**
    ```bash
    npm install
    ```

4. **Build assets:**
    ```bash
    npm run dev
    ```

5. **Activate the theme in WordPress:**
    - Copy the project folder to your WordPress themes directory (`wp-content/themes/`).
    - Go to your WordPress dashboard, navigate to Appearance > Themes, and activate the Travel Explore theme.

6. **Set up ACF fields:**
    - Import the ACF field group JSON file provided in the repository (`acf-fields.json`).

## Usage Guide

### Creating a Reservation

1. **Add a new Travel Reservation:**
    - Go to any Activities(like Biking, Hiking) and choose any offer, fill all fields and wait for admin approval .

2. **QR Code Generation:**
    - The system automatically generates a QR code for each reservation, which can be found in the reservation details.

3. **Admin Approval:**
    - Reservations are set to "Awaiting Approval" status by default.
    - Admin can approve the reservation from the dashboard, which triggers the email notification with the QR code.

4. **Star Ratings:**
    - Users can rate their travel experiences with a star rating system.

5. **Map Guideline:**
    - Use the map feature to show travel locations and provide guidelines on how to get there.

### User Journey

1. **Login System:**
    - Users can log in to access the 'User Journey' post type.

2. **Add a Post:**
    - Logged-in users can add posts and reviews about their travel experiences related to any offer.

### Alternative Tourism

1. **Add an Alternative Tourism Post:**
    - Go to the WordPress admin dashboard and add a new post under the 'Alternative Tourism' post type.

2. **Display Alternative Tourism Posts:**
    - These posts can be featured on your site's activities page or a dedicated section to highlight unique travel experiences.

### Blog Post Type

1. **Add a Blog Post:**
    - Navigate to the WordPress admin dashboard and create a new post under the 'Blog' post type.
    - Share articles, tips, and news related to travel to engage with your audience.