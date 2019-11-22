<p align="center"><img src="https://www.pictureworks.com/files/theme/images/logo.png" width="400"></p>

# Routes

Get and post routes were implemented.

## Get routes
1.  **/user/{$id}** : This route was implemented to receive the id parameter and display the required page.

	**parameter**
> 	- **id**: This is an integer field. It represents the id of the user we are viewing

2. **/user** : This route is meant to capture instances were the user does not provide an id.

3. **/** : This route was added to display an appropriate error in the eventuality that the user goes directly to the home route rather than the "/user/{$id}" route.

## Post route
1. **/user** : This route is the route that will receive the data that will be used to modify user comments. It receives three (3) parameters.

	**parameters**
> 	- **id**: This is an integer field. It represents the id of the user we are viewing
> 	- **password**: This should hold a string who's value represents the static password in the code.
> 	- **comments**: This will hold the string that will be appended to the user's comment in the database.