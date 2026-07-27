# 🚀 Employee Management System

<p align="center">

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge\&logo=bootstrap\&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge\&logo=javascript\&logoColor=black)
![AJAX](https://img.shields.io/badge/AJAX-Fetch_API-blue?style=for-the-badge)
![JSON](https://img.shields.io/badge/JSON-Data_Exchange-lightgrey?style=for-the-badge)
![Git](https://img.shields.io/badge/Git-Version_Control-F05032?style=for-the-badge\&logo=git\&logoColor=white)

</p>

---

# Overview

The **Employee Management System** is a full-stack web application developed using **PHP**, **MySQL**, **Bootstrap 5**, and **JavaScript**. It provides a responsive interface for managing employee records through complete **Create, Read, Update, and Delete (CRUD)** operations.

The application combines server-side processing with asynchronous client-side communication using the **Fetch API** and **JSON**, allowing employee records to be loaded and updated dynamically without requiring full page reloads.

This project demonstrates practical implementation of modern web development concepts, database integration, and responsive interface design.

---
# Key Features
* Employee Registration
* View Employee Records
* Update Employee Information
* Delete Employee Records
* Dynamic Data Loading with Fetch API
* JSON-Based Data Exchange
* Responsive Bootstrap Interface
* Edit and Delete Confirmation Modals
* MySQL Database Integration
* Clean and Organised Code Structure

---

# Technology Stack

| Category                   | Technologies             |
| -------------------------- | ------------------------ |
| Backend                    | PHP                      |
| Database                   | MySQL                    |
| Frontend                   | HTML5, CSS3, Bootstrap 5 |
| Client-side Scripting      | JavaScript (ES6)         |
| Asynchronous Communication | Fetch API (AJAX)         |
| Data Format                | JSON                     |
| Version Control            | Git & GitHub             |

---

# Application Architecture

The application follows a simple layered workflow that separates the presentation layer, server-side processing, and database operations.

```text
Browser
    │
    ▼
HTML • CSS • Bootstrap • JavaScript
    │
    ▼
Fetch API (AJAX)
    │
    ▼
PHP Backend
    │
    ▼
MySQL Database
```

Dynamic employee data is requested from the server as JSON and rendered on the page using JavaScript, creating a smoother and more responsive user experience.

---

# Project Structure

```text
Employee-Management-System
│
├── index.php
├── db_con.php
├── formSubmit.php
├── getData.php
├── edit.php
├── update.php
├── delete.php
├── style.css
├── database.sql
└── README.md
```

---

# Core Functionality

The system includes the following modules:

* Employee Registration
* Employee Listing
* Record Editing
* Record Deletion
* Database Connectivity
* Dynamic Data Rendering
* Form Validation
* Responsive User Interface

---

# Skills Demonstrated

This project demonstrates practical experience with:

* PHP Development
* CRUD Operations
* MySQL Database Design
* SQL Queries
* Fetch API
* AJAX Communication
* JSON Data Handling
* DOM Manipulation
* Bootstrap Components
* Responsive Web Design
* Client–Server Communication
* Full-Stack Web Development

---

# Installation

## Clone the Repository

```bash
git clone https://github.com/yashfamustafa/Employee-Management-System.git
```

---

## Navigate to the Project

```bash
cd Employee-Management-System
```

---

## Configure the Environment

Copy the project folder into your XAMPP `htdocs` directory.

Example:

```text
C:\xampp\htdocs\
```

---

## Create the Database

Create a MySQL database named:

```sql
CREATE DATABASE employee;
```

Import the included `database.sql` file.

---

## Start the Server

Launch the following services using the XAMPP Control Panel:

* Apache
* MySQL

---

## Run the Application

Open the following URL in your browser:

```text
http://localhost/Employee-Management-System
```

---

# Screenshots

> Add screenshots demonstrating the application's user interface.

```text
screenshots/
    dashboard.png
    add-employee.png
    edit-employee.png
    delete-employee.png
```

---

# Future Enhancements

Planned improvements include:

* User Authentication & Authorisation
* Role-Based Access Control
* Search, Sorting & Filtering
* Pagination
* Dashboard Analytics
* Export to PDF & Excel
* Employee Profile Images
* RESTful API Integration
* MVC Architecture
* Prepared Statements
* Advanced Form Validation
* Email Notifications

---

# About the Developer

**Yashfa Mustafa**

Software Engineering student with an interest in full-stack web development, database systems, and software engineering. I enjoy building practical applications that combine clean user interfaces with reliable backend functionality while continuously expanding my technical expertise.

---

# Connect

**GitHub**

https://github.com/yashfamustafa

**LinkedIn**

https://www.linkedin.com/in/yashfa-mustafa-2963463a3

**Email**

[yashfamustafa04@gmail.com](mailto:yashfamustafa04@gmail.com)

---

# Contributing

Contributions, suggestions, and improvements are welcome. Feel free to fork this repository and submit a pull request.

---

# License

This project is licensed under the MIT License.

---

⭐ If you found this project useful, consider giving it a star to support future development.
