# Real-estate-marketplace

Objective:
Let’s assume you have a startup idea for a company, your desires are to bring the property
buyer and property sellers under a single platform. Please use a creative name for your
company, for example, I would call my company (PropertTy-Hub) be creative and have a
spinoff name similar to what I have created.

Business Plan: You are now planning to build a fully functional website. You have teamed up
with your members; Secondly, this website will create three working portals. In summary, you
will accomplish individual milestones. You MUST apply the implementation of SCRUM
methodology

Milestone-1: Home page and User Registration.
Home Page:
Design a generic home page describing: (same concept as an About page)
● Description of your project.
● What does your company do?
● What kind of services do you provide?
● Why do they have to choose you over your competitors?
● Anything that you do as a business unit to attract customers.
User Registration
1. Now as a team, you have discussed what kind of users your platform will be having.

2. Users: Buyers and Sellers. You also wanted to add an Admin user to analyze your
business.

3. This Portal must handle the registrations and login of all the users.
Front End (FE):
● Design a signup page with all the required form fields. For example first name, last
name, email id, username, etc. Make sure you collect all the form data that is
required from the users to run your business effectively.
● Handle all the form validations.
Back-End (BE):
● Design your DB Schema.
● Store the all the required data in the database
● Make sure you are encrypting the passwords when you store them in the DB.

User Registration (option 2) (Optional):
This credit card type detection is a nice addition to the standard payment form because it frees
up the user from entering what is redundant information
Use the data structure called an inversion map from the Google Closure Library. This data
structure maps integer ranges to values, a perfect fit for mapping card number prefixes to card
types. This card detection code isn’t restricted to regular expression syntax, so it’s free to
declaratively mirror the original card number ranges before being transformed and assembled
into the final data structure.

Fields for Card Entry
● The credit card should have
● Your name
● Credit card type
● Credit card number
● Expiration date
● Extra Feature Coupon or discounts
Second Form fields as it relates to the Credit Card
● Address
● Billing Address
● Phone number

What’s in a Credit Card Number?

Despite looking somewhat random, credit card numbers are governed by strict conventions.
There is a standard called ISO/IEC 7812 that specifies the format for identification numbers on
credit cards as well as other card-based identification numbers. The entire identification number
is separated into three parts:

Issuer Identification Number (IIN). The IIN is the first four to six digits of the overall
identification number, and it represents the company that issued the card. In the case of credit
cards, the IIN represents the issuing bank.
Account Number. The next few numbers are your identification number. For credit cards, this
is your account number.
Check Digit. The very last digit is used to verify the overall validity of the identification
number. Calculations are used with the preceding numbers to determine that the number format
is correct.
Consider the sample MasterCard number 5555-5555-5555-4444 (don’t worry, all banks have
sample credit card numbers you can use for testing purposes). The first four digits, 5555, is the
IIN representing the fake bank issuing the MasterCard. The numbers 5555-5555-444 are the
individual account number and the last 4 is the check digit.
Detecting Credit Card Type
The interesting thing about the IIN is that it also determines the type of credit card.

Here are some common IIN patterns:
⮚ MasterCard IINs have the first two digits in the range 51-55
⮚ Visa always begins with a 4
⮚ American Expression IINs always begin with 34 or 37
Knowing this, it’s possible to write a simple JavaScript function to determine the type of credit
card given an account number.
Please implement this approach by displaying the detected card type in the bottom right of
the credit card form
The use of large text instead of small icons creates a more readable interface. The text is
styled just enough to be a noticeable experiment with transitioning so when you start typing the
Card logo can now be displayed at the bottom of the form.

Here are some demo images you can use to display
*********PLEASE NOTE ALL GRADUATE STUDENTS ARE REQUIRED TO CREATE
AN EXTRA FEATURE (CREATE YOUR FUNCTIONALITY WHAT IS NOT DESCRIBED
BY ME ***********

Milestone -2 User Login:
Once the new user is registered successfully the user must be redirected automatically to the
login page.
FE + BE:
● Design and develop your login page.
● If the user exits after verification of the password fetched from the DB you should
redirect the user to his dashboard to officially sign in.
Redirecting Rules:
● If the user is a seller, redirect the user to the seller dashboard.
● If the user is a buyer, redirect the buyer to the buyer dashboard.
● If the user is an admin, redirect the admin to the admin dashboard.
Make use of the session’s concepts for example in the general situation :
1. The session id is sent to the user when his session is created.
2. It will store a cookie (called, by default, PHPSESSID...etc...)
3. The cookie is sent by the browser to the server with each request
4. The server (PHP) uses that cookie, containing the session_id, to know which file
corresponds to that user.

IN MILESTONES – 3, 4 & 5, YOU CAN CHOOSE TO CREATE ONLY ONE.
CHOOSE EITHER SELLER/ USER /ADMIN DASHBOARDS FOR THIS PROJECTS

Milestone - 3 Seller Dashboard:
FE :
Once the seller logs into their account the dashboard should list all the properties details also
called card(s) tied to that user.
For example:
1. The location and age
2. The floor plan (including the site's square footage)
3. The number of bedrooms
4. Additional facilities (such as bathrooms)
5. Presence of a garden
6. Parking availability
7. Proximity to nearby facilities (such as large towns, schools and colleges)
8. Proximity to main roads
9. Property tax records - calculate 7% of value
If the user hasn’t registered any property previously there should be a card with a + Symbol
suggesting to add the new property to the platform. Implement some logic to emphasized that
they must click the + symbol
● Fetch all the properties from DB.
● List them in the form of cards.
Card:
○ Each card must have an image. The main details like the location, price, etc.
○ Once the user clicks on the card. The user must be redirected to the complete
details of the property.
○ The user should be able to update the property details in the complete video of the
property details page.
○ The user should be able to delete the listed property.
BE:
Once the seller adds a property to the platform, store all the details in the property table in the
DB with the foreign key user owning the property.
Design your DB Schema as per your convenience but the above-mentioned point is just a
suggestion and best practice.
