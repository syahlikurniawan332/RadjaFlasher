# Radja Flasher

Website company profile dan layanan untuk **Radja Flasher**, sebuah usaha yang menyediakan layanan perbaikan dan penanganan perangkat smartphone.

Project ini dikembangkan menggunakan Laravel dengan fokus pada tampilan yang responsif, penyajian informasi layanan, galeri hasil pekerjaan, artikel, ulasan pelanggan, serta kemudahan pelanggan untuk menghubungi Radja Flasher melalui WhatsApp.

## ✨ Features

- Responsive landing page
- Informasi layanan perbaikan smartphone
- Galeri hasil pekerjaan
- Before & after service showcase
- Customer testimonials
- Google Maps location
- Business hours information
- WhatsApp contact integration
- Artikel dan informasi seputar smartphone
- Responsive navigation for desktop and mobile

## 🛠️ Tech Stack

- **Laravel**
- **PHP**
- **Blade**
- **Tailwind CSS**
- **JavaScript**
- **Vite**

## 📁 Project Structure

```text
app/            Application logic and services
config/         Application and business configuration
public/         Public assets and compiled frontend files
resources/      Blade views, CSS, JavaScript, and static data
routes/         Application routes
tools/          Supporting utilities
```

## 🚀 Running Locally

Clone repository:

```bash
git clone https://github.com/syahlikurniawan332/RadjaFlasher.git
cd RadjaFlasher
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Build frontend assets:

```bash
npm run build
```

Run Laravel:

```bash
php artisan serve
```

Then open:

```text
http://127.0.0.1:8000
```

## ⚙️ Environment

Configuration specific to each environment is stored in `.env`.

The `.env` file is intentionally excluded from this repository to prevent credentials and environment-specific configuration from being published.

## 📌 Project Status

**In Development**

The website is currently being optimized for performance, responsive design, SEO, and production deployment.

## 👨‍💻 Developer

Developed by **Syahli Kurniawan**.

This project is also part of my web development portfolio.

## 📄 License

This project was developed for Radja Flasher. Source code is published for portfolio and demonstration purposes.