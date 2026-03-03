# Student CRUD - Lab 5

This project is a simple Student Management System built using:

- PHP
- MySQL
- HTML
- CSS
- Bootstrap

---

## Features

- Add Student
- View Students
- Edit Student
- Delete Student
- Status message using URL
- Clean user interface

---

## How It Works

Student ID is passed using URL:

edit.php?id=1  
delete.php?id=1  

After action, it redirects like:

index.php?status=success  

Status message is shown on homepage.

---

## Database Setup

Create database:

CREATE DATABASE student_db;

Create table:

USE student_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address VARCHAR(255),
    course VARCHAR(100)
);

---

## How To Run (Laragon)

1. Put folder inside:
C:\laragon\www\

2. Start Laragon

3. Open browser:
http://localhost/YOUR_FOLDER_NAME/

---

## Live URL 

http://localhost/Lab5/employee-crud/

---

## Screenshot

<img width="1848" height="787" alt="image" src="https://github.com/user-attachments/assets/b33bf2a7-b913-4435-bc37-d5385a446a33" />


---

## Video Demo

https://drive.google.com/file/d/1J3o0-F8wPA3hO5h8lPEIzmdyEbIBcxbO/view?usp=sharing

---

## Author

Name: Hamza Naseer 
Course: Web Technologies  
Semester: 6th  
University: Khwaja Fareed University of Engineering & Information Technology
