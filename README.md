# 📄 AI-Powered Resume Generator – Backend

This project is a backend service built with **Laravel**, **OpenAI API**, and **Browsershot (Headless Chrome)** to generate **AI-powered professional resumes**.

Users provide CV information in JSON format and also include a `"design"` field where they can describe in natural language (sentence/paragraph) what kind of design they want.  
The system uses GPT models to generate professional **HTML resume templates**, renders them to PDF with Browsershot, and returns them for download.

---

## 🚀 Features
- 🧠 **AI (OpenAI GPT) integration** → generates resume content and design
- 🎨 **Dynamic design control** via `"design"` field (examples:
    - "Corporate CV, blue sidebar, progress bars for skills"
    - "Creative, colorful CV for a game developer with neon headers"
    - "Minimalist academic CV in grayscale, single column")
- 📄 **PDF output with Browsershot** → modern CSS, flexbox, grid, icons supported
- 🌍 **Multi-language support** → English & Turkish
- ✅ **Flexible JSON input** → users can add/remove fields freely

---

## 📂 Project Structure

app/
├── Http/Controllers/AIController.php
├── Services/OpenAIService.php
├── Services/PdfExportService.php
routes/
└── api.php

---

## ⚙️ Installation

### 1. Clone the repository
git clone https://github.com/username/ai-resume-generator-backend.git
cd ai-resume-generator-backend

### 2. Install dependencies
composer install
npm install puppeteer --save-dev

### 3. Configure environment variables (.env)
OPENAI_API_KEY=sk-xxxxxx

### In config/services.php:
'openai' => [
'key' => env('OPENAI_API_KEY'),
],

### 4. Run the server
php artisan serve

### Backend will run on http://127.0.0.1:8000.


---

# 📄 Yapay Zeka Destekli CV Üretici – Backend

Bu proje, **Laravel**, **OpenAI API** ve **Browsershot (Headless Chrome)** kullanılarak geliştirilmiş bir **AI destekli özgeçmiş oluşturucu backend servisidir**.

Kullanıcılar CV bilgilerini JSON formatında gönderir, ayrıca `"design"` alanına istedikleri tasarımı doğal dilde (cümle/paragraf olarak) yazar.  
Sistem, GPT modelleri ile profesyonel **HTML CV şablonları üretir**, Browsershot ile PDF’e dönüştürür ve indirilebilir hale getirir.

---

## 🚀 Özellikler
- 🧠 **AI (OpenAI GPT) entegrasyonu** → profesyonel CV içerik + tasarım üretir
- 🎨 **Dinamik tasarım alanı** → `"design"` alanına kullanıcı doğal dilde yazabilir (ör:
    - "Kurumsal bir CV, mavi sidebar, skills kısmı progress bar şeklinde"
    - "Oyun geliştirici için yaratıcı, renkli, neon başlıklı CV"
    - "Minimal, tek kolonlu, gri tonlarda akademik CV")
- 📄 **PDF çıktısı Browsershot ile** → modern CSS, grid, flex, ikon desteği
- 🌍 **Çoklu dil desteği** → Türkçe & İngilizce
- ✅ **Esnek JSON girişi** → kullanıcı istediği alanı ekleyebilir/çıkartabilir

---

## 📂 Proje Yapısı

app/
├── Http/Controllers/AIController.php
├── Services/OpenAIService.php
├── Services/PdfExportService.php
routes/
└── api.php

---

## ⚙️ Kurulum

### 1. Projeyi indir
git clone https://github.com/kullanici/ai-resume-generator-backend.git
cd ai-resume-generator-backend

### 2. Bağımlılıkları yükle
composer install
npm install puppeteer --save-dev

### 3. Ortam değişkenlerini ayarla
OPENAI_API_KEY=sk-xxxxxx

config/services.php dosyasına:
'openai' => [
'key' => env('OPENAI_API_KEY'),
],

### 4. Server’ı çalıştır
php artisan serve

Backend `http://127.0.0.1:8000` adresinde çalışır.
