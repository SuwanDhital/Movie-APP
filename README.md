# Movie App

## Description
The **Movie App** is a web application that allows users to search for movies and retrieve details such as title, genre, release year, actors, director, and more. It fetches data from the OMDB API and stores it in a MySQL database for future queries.

## Features
- Search for movies by title
- Display movie details including poster, genre, director, actors, etc.
- Store movie data in a MySQL database
- Fetch movie details from the OMDB API if not found in the database
- Simple and clean UI with responsive design

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, MySQL
- **API:** OMDB API

## Installation & Setup
### Prerequisites
Ensure you have the following installed:
- XAMPP, WAMP, or any local PHP server
- MySQL Database
- Internet connection (for OMDB API requests)

### Steps to Run the Project
1. **Clone the Repository**
   ```bash
   git clone https://github.com/SuwanDhital/movie-app.git
   cd movie-app
   ```
2. **Setup Database**
   - Import the SQL structure from the `PHP` script in `index.php` or run the following manually:
     ```sql
     CREATE DATABASE IF NOT EXISTS MOVIEAPP;
     USE MOVIEAPP;
     CREATE TABLE IF NOT EXISTS MOVIETABLE (
       Movie_Name VARCHAR(200),
       R_Year VARCHAR(200),
       Poster VARCHAR(200),
       Types VARCHAR(200),
       Genre VARCHAR(200),
       Actors VARCHAR(200),
       Writer VARCHAR(200),
       Director VARCHAR(200),
       Awards VARCHAR(200),
       Country VARCHAR(200),
       Languages VARCHAR(200),
       Rated VARCHAR(200),
       Runtime VARCHAR(200),
       TotalSeasons VARCHAR(200),
       Descriptions VARCHAR(200)
     );
     ```
3. **Configure Database Connection**
   - Open `index.php` and modify the database credentials if needed:
     ```php
     $serverName = "localhost";
     $userName= "root";
     $password = "";
     ```
4. **Run the Application**
   - Place the project folder inside your local server directory (e.g., `htdocs` for XAMPP).
   - Start Apache and MySQL from XAMPP.
   - Open a web browser and go to:
     ```
     http://localhost/movie-app/
     ```

## Usage
- Enter a movie title in the search bar and click the search button.
- If the movie is found in the database, it will be displayed.
- If not found, the app fetches data from the OMDB API, stores it in the database, and displays it.

## API Key Setup
- The app uses OMDB API to fetch movie details.
- Replace `YOUR_OMDB_API_KEY` in `index.php` with your own OMDB API key:
  ```php
  $url = "http://www.omdbapi.com/?t=".$movie."&apikey=YOUR_OMDB_API_KEY";
  ```
- Get a free API key from [OMDB API](https://www.omdbapi.com/apikey.aspx).

## Screenshots
![alt text](<Screenshot 2025-01-29 185233.png>)

## Future Improvements
- Add user authentication
- Improve UI/UX design
- Implement pagination for search results
- Add movie rating and review features

## License
This project is open-source and available under the [MIT License](LICENSE).

