# A2_Gr1_OOP_init
Super Pokemon Project

Here is my pokemon project. Everything is done, and seems to work nicely.
I'm writting this README in order to explain somethings that I've done, but I dunno whether it's cool or not. 

For the relation @OneToOne between Pokemon and Trainer table in the database, I've added a column in each table : "user_id" in the Pokemon Table,
and "poke_id" in the Trainer table (I just edit the database when a trainer create a pokemon and set pokemon_id and user_id values
I set their default values to 0). Plus, for displaying the pokemon name I add a column pokemon name in the trainer table. 
I set a default value for this column too so there is no trouble while creating a user or so.
I don't know if it's a "proper" way to code this, but I didn't think about other way to do it (I have noticed the findOneBy method
a little bit to late to simplify my code for instance). Thank you for this last project, was cool.
