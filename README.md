# SMU PCWEB4: Database Design for Web App Development

Welcome to the SMU PCWEB4 project! This repository contains exercises and solutions related to database design and management for web app development. The project involves creating and manipulating databases using phpMyAdmin and SQL, including aggregation functions, wildcards, and SQL JOIN operations.

## Exercises

### Exercise 1: phpMyAdmin

1. **Create a New Database**:
   - Use phpMyAdmin to create a new database.

2. **Retrieve Data**:
   - Retrieve all information from the `books` table.
   - Retrieve all titles and years from the `books` table.
   - Retrieve all information from `books` for years after 2000.
   - Retrieve all information from `books` for years before 2000.
   - Retrieve all information from `books` where the genre equals 'fiction'.
   - Retrieve all titles and authors from `books` for years after 2000 and before 2004.
   - Retrieve all titles, authors, and years from `books` for years after 2000 and where the genre equals 'fiction'.
   - Retrieve all titles and authors from `books` for years after 2000 or before 2004.
   - Retrieve all titles, authors, and years from `books` for years not earlier than 2004.

### Exercise 2: Database and Table Creation

1. **Create a Database**:
   - Create a new database called `movie_reviews`.

2. **Create Tables**:
   - Use the console to create one of the following tables: `userinfo`, `movies`, `movie_reviews`, or `user_relation` using the provided SQL text files. The remaining tables should be created using phpMyAdmin.

3. **Aggregation Functions and Sorting**:
   - Practice using SQL aggregation functions, the `ORDER BY` keyword, and sorting data.

### Exercise 3: Advanced Queries

1. **Aggregation Functions**:
   - Retrieve all genres and the average year from `books`, grouped by genre.
   - Retrieve all genres and the largest year from `books`, grouped by genre.
   - Retrieve all genres and the smallest year from `books`, grouped by genre.

2. **Sorting Data**:
   - Retrieve all information from `books` sorting it by the latest year first.
   - Retrieve all information from `books` sorting it first by the latest year and then alphabetically by author.
   - Retrieve all genres and years from `books`, sorting it first by genre and then by the latest year.

3. **Wildcards and Data Manipulation**:
   - Practice using wildcards in queries.
   - Perform `INSERT INTO`, `UPDATE`, and `DELETE` operations on the `books` and `reviews` tables.

### Exercise 4*: Advanced Data Manipulation

**Part A**:
1. **Count Reviews**:
   - Count the number of reviews for `movie1`.

2. **Select Reviews**:
   - Select all reviews by users that `user1` is following, showing `user_id`, `movie_id`, and `ratings`.
   - **Additional Exercise**: Also select `movie_name`.

**Part B**:
1. **Book Review Database**:
   - Retrieve all titles and average ratings from `books`.
   - Retrieve authors and ratings for books with ratings above 4.4.

### Exercise 5: New Database Creation and Analysis

1. **Create a New Database**:
   - Create a database called `bikeshare`.

2. **Copy SQL Schema**:
   - Copy the SQL Schema from the provided text file and paste it into the console, then click Go.

3. **Data Analysis**:
   - List all station names alphabetically.
   - Find all IDs and durations of trips longer than 500 minutes, ordered by decreasing duration.
   - Identify all trips completed by the bike with `bike_id` 450, listing `start_dates` and `start_stations` in ascending order.

### Exercise A: Analysis and Aggregation

1. **Average Docks**:
   - What is the average number of docks at all stations?

2. **Highest Precipitation**:
   - Which zip code has the highest average maximum precipitation? (Hint: `precipitation_in`)

3. **Most Popular Destination**:
   - Which station was the most popular destination? How many trips ended at this station? (Hint: use the station for destination.)

4. **Average Trip Duration**:
   - For each starting station, list the average trip duration by descending duration.
   - **BONUS**: For each starting station, list the average trip duration by descending duration, including the city. (Hint: how do you retrieve the city? Is it the same table?)

### Exercise B: Advanced Data Retrieval

1. **Average Temperature and Rainfall**:
   - Find the average temperature and average rainfall of the three most popular cities for all “Subscribers”. (Hint: how many tables do you need to retrieve the data?)

2. **Longest Trips on Rainy Days**:
   - What were the five longest trips on rainy days? (Hint: what condition is needed to get the longest trip? Is it the same table?)

### Exercise C: Pizzeria Database

1. **Create a New Database**:
   - Create a database called `pizzeria`.

2. **Copy SQL Schema**:
   - Copy the SQL Schema from the provided text file and paste it into the console/phpMyAdmin, then click Go.

3. **Data Analysis**:
   - Find all restaurants, pizzas, and prices sold.
   - Find out what kinds of pizzas have been sold.
   - Find only unique kinds of pizzas that were sold.
   - Find stores that sell “Cheese” pizzas.
   - Find stores selling “Cheese” pizzas priced above $19.
   - Find stores selling “Margherita” or “Hawaiian” pizzas.
   - Find the associated prices for each pizza sold.
   - Tag pizzas as expensive (>$20) or cheap.
   - Find all restaurants and the pizzas they sell, excluding Hawaiian Pizza.
   - Find stores selling pizzas containing “ees”.
   - Find all restaurants selling pizzas priced between $15 and $20.
   - Find all restaurants selling pizzas not in the $15 to $20 range.
   - Find all restaurants with pizzas that have no price tag.
   - Display the price of all pizzas for all restaurants that have a price tag.
   - Find all pizza stores from most expensive to cheapest.
   - Find all pizza stores and group similar stores together. Count the number of Cheese pizzas sold at each branch.
   - Find the number of restaurants selling Hawaiian pizza.
   - Find the ratings of the top-performing restaurants in their respective areas (sort from highest to lowest).
   - Find all restaurant names in the area regardless of their ratings.
   - Find all restaurant names in the area that do not have a rating.
   - Find the number of pizza toppings sold for all restaurants in the area.
   - Find all restaurant names, ratings, and pizza names for rated restaurants.
   - Find all restaurants in the area serving Hawaiian pizza.

## Projects

### Project 1: Sports Player Database

1. **Create a Database**:
   - Create a database called `athletes`.
   - Within this database, create a table called `players` with columns: `PlayerName`, `Description`, `Image`. Set `PlayerName` as the PRIMARY KEY.

2. **Setup**:
   - Create a folder called `blog-athletes` within your WAMP www or MAMP htdocs directory.
   - Within this folder, create another folder called `dbconfig`.
   - Create a new file named `config.php` inside the `dbconfig` folder with the necessary code to connect to the database.

3. **PHP Integration**:
   - Ensure each PHP file in your project includes the connection code from `config.php`.

### Project 2: Movie Review Site

1. **Create a Database-Driven Site**:
   - Adapt your players database to create a movie review site.
   - Users should be able to:
     - Browse movies
     - Add movies, including a thumbnail
     - Edit movies
     - Delete movies

2. **Start Fresh**:
   - Replicate features from the players database with a new theme for the movie review site.

### Project 3: Advanced Movie Review Site

1. **Enhanced Features**:
   - This version includes advanced features with separate tables and more complex SQL operations.
   - Users should be able to:
     - Sign up and sign in
     - Add ratings for movies
     - View their own ratings
     - Edit/Delete their ratings
     - Search for and add/delete friends
     - View friends’ ratings without editing them

2. **Styling**:
   - Add CSS styling to enhance the user interface.

## How to Use

1. **Clone the Repository**:
   - Clone the repository to your local machine using the following command:
     ```bash
     gh repo clone GNID-DEV/smu-pcweb4
     ```

2. **Set Up phpMyAdmin**:
   - Ensure you have phpMyAdmin installed and configured on your local server.

3. **Execute SQL Queries**:
   - Use phpMyAdmin or a SQL client to execute the provided SQL queries and tasks.

4. **Practice SQL Operations**:
   - Perform the SQL operations and queries as described in the exercises to gain hands-on experience.

## Contribution

Contributions to this project are welcome! If you have any suggestions, bug reports, or improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
