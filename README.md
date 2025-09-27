# 📄 AI-Powered Resume & Cover Letter Generator – Backend

This project is a backend service built with **Laravel** and **OpenAI API** that generates professional resumes and cover letters with AI support.

Users can input their CV data through a form or provide it in JSON format. The backend uses GPT models to create a professional **Resume & Cover Letter** and offers **PDF exports** in multiple templates.

---

## 🚀 Features
- 🧠 **AI (OpenAI GPT) integration** → Generates professional resumes & cover letters
- 🌍 **Multi-language support** → English & Turkish
- 🎨 **3 different PDF templates** → `modern`, `minimalist`, `classic`
- 📄 **JSON response or PDF export** options
- ⚡ **Export directly from ready resume & cover letter JSON** (faster, no AI call)
- ✅ Laravel Form Request with validation & error handling

---

## 📂 Project Structure
```
app/
 ├── Http/Controllers/AIController.php
 ├── Http/Requests/GenerateRequest.php
 ├── Services/OpenAIService.php
 ├── Services/PdfExportService.php
resources/views/pdf/
 ├── modern.blade.php
 ├── minimalist.blade.php
 └── classic.blade.php
routes/
 └── api.php
```

---

## ⚙️ Installation

### 1. Clone the repository
```bash
git clone https://github.com/username/ai-resume-generator-backend.git
cd ai-resume-generator-backend
```

### 2. Install dependencies
```bash
composer install
```

### 3. Configure environment variables
Add to `.env`:
```env
OPENAI_API_KEY=sk-xxxxxx
```

### 4. Run server
```bash
php artisan serve
```
Backend will run at `http://127.0.0.1:8000`.

---

## 🔌 API Endpoints

### 1️⃣ Generate Resume & Cover Letter (JSON)
`POST /api/generate`  
Request Body:
```json
{
  "language": "en",
  "cv": {
    "name": "Yiğithan Gümüş",
    "title": "Full-Stack Developer",
    "skills": ["Laravel", "Vue.js", "Docker"],
    "experience": [
      {"company": "YG Soft.", "role": "Frontend Developer", "years": "2022 - 2025"}
    ]
  }
}
```
Response:
```json
{
  "resume": "Generated resume text...",
  "cover_letter": "Generated cover letter..."
}
```

---

### 2️⃣ Generate Resume & Cover Letter PDF (via AI)
`POST /api/export-pdf`  
Request Body:
```json
{
  "language": "tr",
  "template": "modern",
  "cv": {
    "name": "Yiğithan Gümüş",
    "title": "Full-Stack Developer",
    "skills": ["Laravel", "Vue.js", "Docker"]
  }
}
```
📎 Response: PDF download `resume-coverletter.pdf`

---

### 3️⃣ Export Ready Resume & Cover Letter to PDF (no AI call)
`POST /api/export-ready-pdf`  
Request Body:
```json
{
  "resume": "Yiğithan Gümüş\nFull-Stack Developer...",
  "cover_letter": "Dear HR, ...",
  "template": "classic"
}
```
📎 Response: PDF download `resume-coverletter.pdf`

---

## 🎨 PDF Templates
- **modern.blade.php** → Modern, blue highlights
- **minimalist.blade.php** → Clean & simple
- **classic.blade.php** → Traditional Times New Roman

---

## 🛠️ Technologies Used
- **Laravel 10+**
- **OpenAI PHP Client**
- **barryvdh/laravel-dompdf** (PDF export)

---

## 📌 Notes
- Use **Send and Download** in Postman to correctly download PDFs.
- Add caching if many AI requests are made.
- For advanced designs, consider **Browsershot (Puppeteer)** instead of DomPDF.

---

## 📜 License
MIT License

---

# 📄 AI Destekli Özgeçmiş & Ön Yazı Oluşturucu – Backend

Bu proje, **Laravel** ve **OpenAI API** kullanılarak geliştirilmiş bir **AI destekli özgeçmiş (Resume) ve ön yazı (Cover Letter) oluşturucu backend servisidir**.

Kullanıcılar CV bilgilerini bir form aracılığıyla veya JSON formatında girebilir. Backend, GPT modellerini kullanarak profesyonel bir **Resume & Cover Letter** üretir ve farklı şablonlarda **PDF çıktısı** sunar.

---

## 🚀 Özellikler
- 🧠 **AI (OpenAI GPT) entegrasyonu** → profesyonel Resume & Cover Letter üretir
- 🌍 **Çok dil desteği** → Türkçe & İngilizce
- 🎨 **3 farklı PDF şablonu** → `modern`, `minimalist`, `classic`
- 📄 **JSON response veya PDF export** seçenekleri
- ⚡ **Hazır resume & cover letter JSON’dan PDF üretme** (AI çağrısı yapmadan hızlı)
- ✅ Laravel Form Request ile validation & error handling

---

## 📂 Proje Yapısı
```
app/
 ├── Http/Controllers/AIController.php
 ├── Http/Requests/GenerateRequest.php
 ├── Services/OpenAIService.php
 ├── Services/PdfExportService.php
resources/views/pdf/
 ├── modern.blade.php
 ├── minimalist.blade.php
 └── classic.blade.php
routes/
 └── api.php
```

---

## ⚙️ Kurulum

### 1. Projeyi indir
```bash
git clone https://github.com/kullanici/ai-resume-generator-backend.git
cd ai-resume-generator-backend
```

### 2. Bağımlılıkları yükle
```bash
composer install
```

### 3. Ortam değişkenlerini ayarla
`.env` dosyasına:
```env
OPENAI_API_KEY=sk-xxxxxx
```

### 4. Server’ı çalıştır
```bash
php artisan serve
```
Backend `http://127.0.0.1:8000` adresinde çalışacaktır.

---

## 🔌 API Endpoint’leri

### 1️⃣ Resume & Cover Letter JSON Alma
`POST /api/generate`  
Request Body:
```json
{
  "language": "en",
  "cv": {
    "name": "Yiğithan Gümüş",
    "title": "Full-Stack Developer",
    "skills": ["Laravel", "Vue.js", "Docker"],
    "experience": [
      {"company": "YG Software", "role": "Backend Developer", "years": "2022 - 2025"}
    ]
  }
}
```
Response:
```json
{
  "resume": "Oluşturulmuş resume metni...",
  "cover_letter": "Oluşturulmuş ön yazı..."
}
```

---

### 2️⃣ Resume & Cover Letter PDF Alma (AI üzerinden)
`POST /api/export-pdf`  
Request Body:
```json
{
  "language": "tr",
  "template": "modern",
  "cv": {
    "name": "Yiğithan Gümüş",
    "title": "Full-Stack Developer",
    "skills": ["Laravel", "Vue.js", "Docker"]
  }
}
```
📎 Response: `resume-coverletter.pdf` dosyası iner.

---

### 3️⃣ Hazır JSON’dan PDF Alma (AI’siz, hızlı)
`POST /api/export-ready-pdf`  
Request Body:
```json
{
  "resume": "Yiğithan Gümüş\nFull-Stack Developer...",
  "cover_letter": "Sayın İnsan Kaynakları, ...",
  "template": "classic"
}
```
📎 Response: `resume-coverletter.pdf` dosyası iner.

---

## 🎨 PDF Şablonları
- **modern.blade.php** → Modern, mavi vurgular
- **minimalist.blade.php** → Basit & temiz
- **classic.blade.php** → Klasik Times New Roman

---

## 🛠️ Kullanılan Teknolojiler
- **Laravel 10+**
- **OpenAI PHP Client**
- **barryvdh/laravel-dompdf** (PDF export)

---

## 📌 Notlar
- Postman’de **Send and Download** seçeneği ile PDF indirilebilir.
- Çok sayıda AI çağrısı yapılacaksa cache mekanizması eklenebilir.
- Daha gelişmiş tasarımlar için DomPDF yerine **Browsershot (Puppeteer)** kullanılabilir.

---

## 📜 Lisans
MIT License  
