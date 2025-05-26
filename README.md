# 💼 Job Vacancy Posting System (Prototype)

A web-based platform to manage job vacancy listings, applications, and user roles. Designed using **PHP**, **HTML/CSS**, and **MySQL**, this system allows employers to post jobs, job seekers to apply, and admins to manage the overall system. Ideal for academic purposes or small-to-medium recruitment operations.

---

## 📌 Features

- 📝 **Job Posting**: Employers can create, update, and delete job listings.

- 🔍 **Job Search**: Job seekers can browse or filter job listings by category and title.

- 📑 **Application Management**: Users can submit applications and track application status.

---

## 🛠️ Tech Stack

| Layer       | Technology       |
|-------------|------------------|
| Frontend    | HTML, CSS        |
| Backend     | PHP              |
| Database    | MySQL            |

---

## 🗂️ Folder Structure

```
Job-Vacancy-Posting-System/
├── admin/              # Admin dashboard and job controls
├── employer/           # Employer-specific actions (post jobs, manage listings)
├── jobseeker/          # Job seeker views and application features
├── includes/           # Common PHP functions and database config
├── assets/             # CSS, images, and client-side resources
├── index.php           # Entry point to the application
├── README.md           # Project documentation
```

---

## 🚀 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/yasirulokesha/Job-Vacancy-Posting-System.git
   ```

2. **Set up your MySQL database**
   - Import the provided SQL dump (if available) or manually create tables as per schema.

3. **Configure DB credentials**
   - Edit `dbconfig.php` with your MySQL server details:
     ```php
     $conn = new mysqli("localhost", "root", "", "job_system");
     ```

4. **Start your local PHP server**
   ```bash
   php -S localhost:8000
   ```

5. **Access the app**
   - Visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## 📄 License

This project is provided for educational and demo purposes. No commercial license is attached.
