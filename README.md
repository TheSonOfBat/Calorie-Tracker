![Group 5 (2)](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/d55f1c0f-2d87-4d55-8da0-4f745337c618)
# Calorie-Tracker
Fully responsive full-stack calorie tracking web app powered by PHP and MySQL. Created inside XAMPP and utilising its Apache and MySQL servers. Has a fully functioning login/signup system that makes use of password hashing and statement preparing to assist in the security of user data. Users are capable of inputting daily intake of energy and protein and have the app save and track progress for the day. Users also have the ability to export their data in the form as an excel spreadsheet that outlines all recorded data for the user. This is backed by a simple and sleek frontend that dynamically responds to the login status of the user and ensures responsive behaviour for all screen sizes. Below are screenshots that outline functionality and the user interface.

## Screenshots
### Welcome Page

If no session has been established between the current user, the index page will act as a way to opt users to login or signup.

![1](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/371a9f6f-b44d-4050-a2b7-608717823ed8)

### Login/Signup Page

Simple UI that prompts users to fill out the form that has PHP form validation that alerts users of mistakes in their inputs and ensures data integrity.

![2](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/f95362f1-1995-4822-a75e-dcc4025cec4d)
![3](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/10ffe3d0-62f7-4c50-8291-86ebc63bf015)

### Logged In (Index Page)

What a new user or user who has inputted data will receive on entering the index page. Including a logout button, export data button, toggle button, add input button and tracking info. It should be noted that only that day's inputs will be displayed and tracked. Previous data is still stored and can be exported. Underneath is the prompt given to users when inputting data about their food intake.

![4](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/e4d54044-23dc-47ac-88f5-d7712662418a)
![5](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/7b355005-4aca-4272-a371-10a382f07b2c)

### Inputs

Inputs are tracked in small cards that outline the calorie/protein value, item name and time of consumption. These values will then accumulate to make the total intake value on the right-hand side. Underneath is an example of the toggle functionality to display protein values instead of calories.

![4](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/e4d54044-23dc-47ac-88f5-d7712662418a)
![7](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/e8a7ae33-8cc9-48cd-8b5b-ed581aacbc2a)

### Responsiveness

This screenshot highlights the ability for the UI to compress under small screen sizes and optimally use available space to enable ease of use.

![8](https://github.com/TheSonOfBat/Calorie-Tracker/assets/62327154/31378e2f-405e-46fb-95d1-8751078d6a1b)

## Final Notes
This project was centred around making a simple but effective full stack app that utilised a simple but usable design. It contains basic security to respond to common backend threats but improvements in this area can be implemented on a further date. Overall, the project was a fun test of both front end and backend cohesiveness alongside a fun project to design from scratch.
