# Grievance Management System

A web-based **Grievance Management System** developed using PHP, HTML, CSS, and MySQL. The system provides a platform for citizens to submit complaints, upload supporting documents or images, and track grievance status, while administrators can manage and resolve complaints efficiently.

## 📌 Project Details

- **Project Name:** Grievance Management System
- **Development Date:** February 2025
- **Technologies Used:** PHP, HTML, CSS, MySQL
- **Database:** MySQL
- **Frontend:** HTML, CSS

## 🚀 Features

### 👤 Citizen/User Module
- User registration and login.
- Secure user authentication.
- Submit grievances and complaints.
- Upload supporting images for grievances.
- Track complaint status in real time.
- View submitted grievances.

### 🔐 Admin Module
- Admin login and authentication.
- Admin dashboard for managing grievances.
- Review submitted complaints.
- Update complaint status.
- Monitor and manage citizen grievances.
- Facilitate communication between citizens and authorities.

## 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| HTML | Web page structure |
| CSS | Styling and layout |
| MySQL | Database management |
| XAMPP | Local development server |

## ⚙️ Installation and Setup

Follow these steps to run the project locally.

### Step 1: Install XAMPP

Download and install [XAMPP](https://www.apachefriends.org/).

Start the following services:
- Apache
- MySQL

### Step 2: Clone the Repository

Open your terminal and navigate to the XAMPP `htdocs` folder.

```bash
cd C:\xampp\htdocs
```

Clone the repository:

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPOSITORY.git
```

### Step 3: Configure the Database

1. Open your browser.
2. Visit `http://localhost/phpmyadmin/`.
3. Create a new MySQL database.
4. Import the project's SQL database file, if available.
5. Update the database connection details in `db.php`.

Example database connection:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "your_database_name");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

### Step 4: Run the Project

Open your browser and navigate to:

```text
http://localhost/YOUR_REPOSITORY/
```

The project should now run on your local XAMPP server.

## 📂 Project Modules

- **User Authentication:** Handles citizen registration and login.
- **Grievance Submission:** Allows citizens to submit complaints with supporting images.
- **Grievance Tracking:** Enables citizens to monitor complaint status.
- **Admin Dashboard:** Allows administrators to review complaints and update their status.
- **Database Management:** Stores user details and grievance information using MySQL.

## 🎯 Project Objectives

- Provide a simple and accessible platform for citizens to register grievances.
- Improve transparency in complaint tracking and monitoring.
- Simplify grievance management for administrators.
- Improve communication between citizens and authorities.
- Streamline the grievance submission and resolution process.

## 👨‍💻 Developer

Developed as a web development project in February 2025.

**Technologies:** PHP | HTML | CSS | MySQL

---

