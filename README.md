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
