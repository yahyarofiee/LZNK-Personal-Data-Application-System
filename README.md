# 📄 LZNK Personal Data Application System

> **Internship Project**  
> Lembaga Zakat Negeri Kedah (LZNK)  
> Bachelor of Information Technology (Hons.) – Data Analytics (Big Data) & Software Development & Mobile App Development 
> Universiti Teknologi MARA (UiTM)

---

# 📌 Project Overview

The **LZNK Personal Data Application System** is a Laravel-based web application developed during my internship at **Lembaga Zakat Negeri Kedah (LZNK)**.

The system was designed to streamline and digitize the personal data application process by replacing manual workflows with an efficient online platform. It enables applicants to submit requests electronically while allowing officers to review, approve, and manage applications through a centralized system.

---

# 🎯 Project Objectives

- Digitize the personal data application process.
- Reduce manual paperwork and administrative workload.
- Improve application tracking and approval efficiency.
- Provide a secure role-based access system.
- Improve communication between applicants and officers.

---

# ✨ System Features

## 👤 Applicant Module

Applicants can:

- Register an account
- Log in securely
- Submit personal data application forms
- Upload required documents
- Track application status
- View application history
- Download agreements (if available)

---

## 👨‍💼 Data Protection Officer (DPO)

The Data Protection Officer can:

- Review submitted applications
- View applicant information
- Generate agreement documents
- Upload requested documents
- Approve or reject applications
- Forward applications for final approval
- Manage application records

---

## 👨‍💼 Deputy Director Module

The Deputy Director can:

- Review applications
- Approve applications
- Reject applications
- View application history
- Monitor application progress

---

# 🔄 Application Workflow

```text
                Applicant
                    │
                    ▼
        Submit Application Request
                    │
                    ▼
     Data Protection Officer (DPO)
            │                 │
            │                 │
     Incomplete          Complete
            │                 │
            ▼                 ▼
 Return to Applicant     Forward to
    for Editing      Deputy Director
            │                 │
            │                 ▼
            │        Review Application
            │                 │
            │          ┌──────┴──────┐
            │          │             │
            │      Approve        Reject
            │          │             │
            └──────────┴─────────────┘
                       │
                       ▼
          Application Status Updated
                       │
                       ▼
                  Applicant
```

---

# 🛠 Technologies Used

| Category | Technology |
|----------|------------|
| Framework | Laravel |
| Programming Language | PHP |
| Frontend | HTML5, CSS3, JavaScript |
| Styling | Bootstrap |
| Database | MySQL |
| Development Tools | Visual Studio Code |
| Local Server | Laragon |
| Version Control | Git & GitHub |

---

# 🔐 User Roles

| Role | Responsibilities |
|------|------------------|
| Applicant | Submit and track applications |
| Data Protection Officer | Review, manage and approve requests |
| Deputy Director | Final approval and rejection |

---

# 📂 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

artisan
composer.json
package.json
README.md
```

---

# 📷 System Screenshots

## Login Page

*(Add screenshot here)*

```text
screenshots/login.png
```

---

## Applicant Dashboard

*(Add screenshot here)*

```text
screenshots/applicant-dashboard.png
```

---

## DPO Dashboard

*(Add screenshot here)*

```text
screenshots/dpo-dashboard.png
```

---

## Deputy Director Dashboard

*(Add screenshot here)*

```text
screenshots/deputy-dashboard.png
```

---

## Application Form

*(Add screenshot here)*

```text
screenshots/application-form.png
```

---

## Application Records

*(Add screenshot here)*

```text
screenshots/application-records.png
```

---

# 🚀 Installation Guide

## Requirements

- PHP 8.x
- Composer
- MySQL
- Laragon / XAMPP
- Node.js

---

## Installation

Clone the repository

```bash
git clone https://github.com/yahyarofiee/LZNK-Personal-Data-Application-System.git
```

Install Composer dependencies

```bash
composer install
```

Install Node packages

```bash
npm install
```

Copy environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Run database migration

```bash
php artisan migrate
```

Start the development server

```bash
php artisan serve
```

---

# 📈 Skills Demonstrated

- Laravel Development
- PHP Programming
- CRUD Operations
- Authentication & Authorization
- Role-Based Access Control (RBAC)
- MVC Architecture
- MySQL Database Design
- Form Validation
- File Upload Handling
- Workflow Automation
- System Testing
- Git Version Control

---

# 🎓 Learning Outcomes

Throughout this internship project, I gained practical experience in:

- Developing enterprise web applications using Laravel
- Implementing role-based authentication
- Designing relational databases
- Building CRUD modules
- Managing application workflows
- Working with MVC architecture
- Collaborating with supervisors during system development
- Applying software development best practices

---

# 🔮 Future Improvements

Potential enhancements include:

- Email notification integration
- Dashboard analytics
- Audit log module
- Advanced search and filtering
- API integration
- Two-factor authentication (2FA)
- Cloud deployment
- Mobile responsive improvements

---

# 👨‍💻 Author

**Yahya Naim bin Md Rofiee**

Bachelor of Information Technology (Hons.)

**Specialization:** Data Analytics & Big Data

Universiti Teknologi MARA (UiTM)

---

# 📄 Disclaimer

This project was developed during my internship at **Lembaga Zakat Negeri Kedah (LZNK)**.

To protect organizational confidentiality and personal data, sensitive information, credentials, and confidential datasets have been removed from this repository. The source code is shared solely for educational and portfolio purposes.
