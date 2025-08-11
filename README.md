# Perpus Elektro
Digital Literature Management Application for the Department of Electrical Engineering and Informatics, Universitas Negeri Malang

## Main Features

- **Literature Type Management**
  - Add, edit, and delete literature types (e.g., books, journals, theses).
- **Literature Category Management**
  - Add, edit, and delete literature categories as needed.
- **Literature Data Management**
  - Add, edit, and delete literature with details: title, author, publisher, publication year, file link, category, and description.
- **Literature Search**
  - Search feature to easily find desired literature.
- **Thesis Search**
  - Integrated thesis search feature with the master database.

## Installation Steps

1. **Clone the Repository**
    ```bash
    git clone https://github.com/JasonSlav/perpus-elektro.git
    cd perpus-elektro
    ```
2. **Install Composer Dependencies**
    ```bash
    composer install
    ```
3. **Copy the .env File**
    ```bash
    cp .env.example .env
    ```
4. **Generate App Key**
    ```bash
    php artisan key:generate
    ```
5. **Configure .env File**
    - Edit the database and other settings as needed.
      ```
      APP_NAME=PerpusElektro
      DB_CONNECTION=mysql
      DB_DATABASE=perpus_elektro
      DB_USERNAME=root
      DB_PASSWORD=your_password
      ```
6. **Install NPM Dependencies**
    ```bash
    npm install
    ```
7. **Build Tailwind CSS Assets**
    ```bash
    npm run dev
    ```
8. **Run Laravel Server**
    ```bash
    php artisan serve
    ```
9. **Access the Application**
    - Open your browser and go to: `http://localhost:8000`

## Literature Data Structure

Literature data consists of:
- Title
- Author
- Publisher
- Publication year
- File link (URL)
- Category & Type of literature
- Description & details (e.g., number of pages)

## Contribution

Feel free to fork this repository and submit pull requests for feature improvements or bug fixes.

## License

This application uses the [MIT License](LICENSE). You are free to use and modify it as needed.

---

_&copy; Universitas Negeri Malang, Department of Electrical Engineering and Informatics_
