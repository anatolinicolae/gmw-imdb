# :star: Wars Database

We love Star Wars and we want to create our own database using the already existing information of an API. We want you to download 30 characters and all the movies from this API https://swapi.dev/ and to fill our database with that information.

The database will have this 3 tables:
- `characters` (id, name, mass, height, gender, picture)
- `movies` (id, name)
- `movies_characters` (movie_id, character_id)

Create a command that can be ran like this to download the required information:
```
php bin/console starwars:import
```

We want to have our custom information, that’s why we added the column picture in the characters’ table, you won’t find that in the API.

Once you have downloaded the information of the API, we want to see in the homepage the list of all the characters we have in our database. We also want to be able to search characters by their names.

When we click in one of the characters listed, we want to be redirected to a form to edit his data and to be able to upload the character’s picture. We also want to be able to delete the character in the homepage and in the form’s page.

Extra points: Create a new page with the url “/movies” that list all the movies in the database. If we click in one of them we want to see the list of characters of that movie with the uploaded picture.
