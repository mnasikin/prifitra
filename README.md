# 🚀 PRIFITRA

**PRIFITRA** is a super simple tool to migrate or transfer files and databases from an old server to a new one—without the hassle. Lightweight, fast, and designed for rapid deployment.

---

## 📦 Deployment

Getting started is a breeze:

1. **Download or clone** this repository to your new server.
2. **Unzip** the archive.
3. You're **ready to go**—no extra setup required.

---

## 🔧 Server Requirements

To run PRIFITRA smoothly, your server should support:

- PHP 7.4 or higher
- `cURL` extension enabled
- `JSON` extension enabled
- `shell_exec` (optional to migrate database faster)

### ✅ Tested On

- cPanel
- CyberPanel
- HestiaCP

---

## ❓ Frequently Asked Questions

### Why doesn’t PRIFITRA use SQL?

This tool focuses solely on quick file transfer. Introducing a database just to move files would complicate a process that should be fast and simple.

### What are the default login credentials?

You can access PRIFITRA using:

 Username: `prifitra`
 Password: `password`

or

 username: `guest`
 Password: `password`


### What’s the difference between the two users?

Absolutely none—they share the same permissions.

### How do I change the default username and password?

1. Open the file: `/inc/login/login.json`
2. Modify the username field.
3. Generate a bcrypt-hashed password using [bcrypt-generator.com](https://bcrypt-generator.com/) and replace the default hash.

---

## 🙌 Thanks To

Special shoutout to the amazing creators of these front-end templates:

- [Colorlib](https://colorlib.com/wp/template/login-form-v4/) — for the login page design
- [htmlCodex](https://htmlcodex.com/bootstrap-5-admin-template/) — for the dashboard design

---

## 📄 License

This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).
