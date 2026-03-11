# 🎓 Praktix — E-Learning & Internship Platform

A full-stack web platform built with **PHP MVC architecture** that connects learners with industry-driven programs, internships, and expert mentorship.

🔗 **Live Demo:** [ramani.byethost15.com](https://ramani.byethost15.com)

---

## 🚀 Features

- 🔐 **User Authentication** — Register, login with email/password + Google OAuth
- 📚 **Programs** — Browse, search, filter, and enroll in courses
- 💼 **Internships** — Apply for internships with a personal message
- 👤 **Experts** — View expert profiles and register as an expert
- 📊 **Dashboard** — Track enrolled programs and internship applications
- 🤝 **Partner Inquiry** — Organizations can submit partnership requests
- 📬 **Contact Form** — Message submission system
- 🛡️ **Admin Panel** — Manage programs, internships, applications, and users

---

## 🏗️ Architecture — MVC Pattern

```
praktix/
├── index.php                  ← Single entry point + router
├── .htaccess                  ← URL rewriting
├── config/
│   └── db.php                 ← Database connection
├── app/
│   ├── core/
│   │   ├── Router.php         ← URL router
│   │   ├── Controller.php     ← Base controller
│   │   └── Model.php          ← Base model
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── AuthController.php
│   │   ├── ProgramController.php
│   │   ├── InternshipController.php
│   │   ├── ExpertController.php
│   │   ├── DashboardController.php
│   │   └── PageController.php
│   ├── models/
│   │   ├── UserModel.php
│   │   ├── ProgramModel.php
│   │   ├── InternshipModel.php
│   │   ├── ExpertModel.php
│   │   └── ContactModel.php
│   └── views/
│       ├── layouts/           ← header.php, footer.php
│       ├── auth/              ← login.php, register.php
│       ├── programs/          ← index.php, show.php
│       ├── internships/       ← index.php, show.php
│       ├── experts/           ← index.php, show.php, register.php
│       ├── dashboard/         ← index.php
│       └── pages/             ← home.php, about.php, contact.php, partner.php
├── public/
│   ├── assets/                ← CSS, images
│   └── uploads/               ← User uploaded files
└── admin/                     ← Admin panel
```

---

## 🛠️ Tech Stack

| Layer      | Technology               |
|------------|--------------------------|
| Backend    | PHP 8 (MVC, no framework)|
| Database   | MySQL with PDO           |
| Frontend   | Bootstrap 5, JavaScript  |
| Auth       | PHP Sessions + Google OAuth (GSI) |
| Hosting    | Shared hosting (byethost)|

---

## 🛠️ Languages Used

![PHP](https://img.shields.io/badge/PHP-95.2%25-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-2.1%25-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-included-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)


*.php linguist-language=PHP
*.css linguist-language=CSS


## ⚙️ Installation

1. **Clone the repo**
```bash
git clone https://github.com/YOUR_USERNAME/praktix.git
cd praktix
```

2. **Configure database** in `config/db.php`:
```php
$host     = "your_host";
$dbname   = "your_db";
$username = "your_user";
$password = "your_password";
```

3. **Enable mod_rewrite** on your server (`.htaccess` included)

4. **Import the database** schema from `database.sql` (if included)

5. **Set up Google OAuth** — update your Client ID in:
   - `app/views/auth/login.php`
   - `app/views/auth/register.php`
   - `app/controllers/AuthController.php`

6. **Point your server root** to the `praktix/` folder

---

## 👨‍💻 Author

**Meetkumar Ramani**
- GitHub: [MeetRamani1101](https://github.com/YOUR_USERNAME)
- Live: [ramani.byethost15.com](https://ramani.byethost15.com)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).
